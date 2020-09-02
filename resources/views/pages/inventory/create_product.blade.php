@extends('app')
@section('css')
    <link rel="stylesheet" href="/assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="/assets/bundles/summernote/summernote-bs4.css">
@endsection
@section('js')

    <script src="/assets/bundles/jquery-validation/dist/jquery.validate.min.js"></script>
    <!-- JS Libraies -->
    <script src="/assets/bundles/jquery-steps/jquery.steps.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/form-wizard.js"></script>
    <script src="/assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/bundles/summernote/summernote-bs4.js"></script>
    <script>
        $(document).ready(function(){
            $(".inputtags").tagsinput('items');
            $('#variants').click(function(){
                if($(this).is(":checked")){
                   $('#attributes_section').show()
                }
                else if($(this).is(":not(:checked)")){
                    $('#attributes_section').hide()
                }
            });

        });
        let variationsArr=[];
        let varObj={

        }
        let i=0;
        $('#variants_input').addClass('test'+i);
        function duplicate_sec(){
            $('#variants_input').removeClass('test'+i);
            i=i+1
            $('#variants_input').addClass('test'+i);
            $('#variants_input').clone().appendTo('#dup_variants_input');
            $('#variants_input').removeClass('test'+i);
            if(varObj.name!==null && varObj.value!==null){
                variationsArr.push(varObj)
            }

             varObj={}
            console.log(variationsArr)
        }


        function remEle(event){

            let classname=event.path[2].classList[1];
            console.log(event.path[2].classList)
            $('.'+classname).remove()
        }


        function addOption(event){
            let varOption=event.target.value;
            varObj['name']=varOption;


            console.log(varObj)
        }
        function addOptionValue(event){
            let varOptionVal=event.target.value;
            console.log(varOptionVal)
            varObj['value']=varOptionVal;
        }

        function generateVariations(){
            if(varObj.name!==null && varObj.value!==null){
                variationsArr.push(varObj)
            }
          $.ajax({
              method:'POST',
              data:{
                  'items':variationsArr
              },
              url:'/admin/variations/add/{{request()->stock_id}}',
              success:function (resp){
                  console.log(resp)
              },
              error:function (error){
                  console.log(error)
              }
          })
        }

    </script>
    @endsection
@section('content')
    @include('components.nav')
    <div class="main-sidebar sidebar-style-2">
        @include('components.sidebar')
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Product</h4>
                            </div>
                            <div class="card-body">
                                <form action="/admin/inventory/create_product/{{request()->stock_id}}" method="POST">
                                    <h3>General Information</h3>
                                    @csrf

                                    <fieldset>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Product name*</label>
                                                <input type="text" class="form-control" name="product_name" required>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Category*</label>
                                                <select name="category_id" class="form-control required ">
                                                    <option disabled selected >--select--</option>
                                                    @foreach(\App\Category::all() as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Unit of measure*</label>
                                                <select name="unit_of_measure" class="form-control required ">
                                                    <option disabled selected >--select--</option>
                                                    @foreach(json_decode(\App\Setting::where('key','units_of_measure')->first()->value) as $key=>$val)

                                                    <option value="{{$val}}">{{$val}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-check form-check-inline">
                                                <input  class="form-check-input" type="checkbox" id="variants" value="1">
                                                <label class="form-check-label" for="variants">Yes, this product has multiple variants</label>
                                            </div>
                                            <p><small><i>Does this product come in different colors, sizes or similar?</i></small></p>
                                        </div>
                                        <div style="display: none" id="attributes_section">

                                            <div id="variants_input" class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label >Variant option</label>
                                                    <input onchange="addOption(event)" name="variant_option[]" type="text" class="form-control"  placeholder="e.g Color, etc">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Option Value&nbsp;<small>Enter comma separated values</small></label>
                                                    <input onchange="addOptionValue(event)" type="text" name="option_value" class="form-control"  >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label></label>
                                                    <br/>
                                                    <br/>

                                                    <i onclick="remEle(event)" style="cursor: pointer" class="fa fa-trash remBtn"></i>
                                                </div>

                                            </div>
                                            <div id="dup_variants_input"></div>

                                                <button type="button" onclick="duplicate_sec()" class="btn btn-icon btn-primary"><i class="fa fa-plus-circle"></i></button>


                                            <div class="text-right">
                                                <button onclick="generateVariations()" type="button"  class="btn btn-icon btn-primary">Save Variations</button>
                                            </div>

                                        </div>
                                        <div class="form-group form-float">
                                            <label >Additional information</label>
                                            <textarea name="more_info" class="summernote-simple"></textarea>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary">Save Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
