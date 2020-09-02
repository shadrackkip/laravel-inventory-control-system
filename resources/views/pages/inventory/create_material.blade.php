@extends('app')
@section('css')
    <link rel="stylesheet" href="/assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="/assets/bundles/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/assets/bundles/izitoast/css/iziToast.min.css">
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
    <script src="/assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/toastr.js"></script>
    <script>
        $(".inputtags").tagsinput('items');
        let varArr=[];
        let varObj={}
        function saveVariants(){
            varObj={};
            let option=$('#variant_option');
            let option_value=$(".inputtags").tagsinput('items')
            if(option!=='' && option_value!==''){

                varObj['name']=option.val()
                varObj['value']=option_value
                varObj['track_id']="{{$track_id}}"

                console.log(varArr);

                $.ajax({
                    method:'POST',
                    data:varObj,
                    url:'/admin/inventory/materials/attributes/create',
                    success:function (resp){

                        iziToast.show({
                            title: 'Attribute saved',
                            position: 'bottomRight'
                        });
                        $('.inputtags').tagsinput('removeAll');
                        option.val(' ')
                    },
                    error:function (error){
                        console.log(error)
                    }

                })

               /// $('#variants').modal('hide');
            //    $('.inputtags').tagsinput('removeAll');

            }

        }

        function displayVariants(){

            $.ajax({
                method: 'GET',
                url: '/admin/inventory/materials/attributes/getAttributes/{{$track_id}}',
                success:function (resp){
                    console.log(resp)
                    resp.forEach(function (item,i){
                        let output = `
                <div class="form-group col-md-4">
                                <label >Variant option</label>
                                <input readonly value="${item.name}"   name="variant_option" type="text" class="form-control"  placeholder="e.g Color, etc">
                            </div>
                            <div class="form-group col-md-8">
                                <label >Option Value&nbsp;<small>Enter comma separated values</small></label>
                                <input readonly value="${JSON.parse(item.attributes).toString()}"  type="text" name="option_value" class="form-control inputtags"  >
                            </div>
              `
                        $('#output').append(output);
                    })
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
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                Material
                            </div>
                            <div class="card-body">
                                <form action="/admin/inventory/materials/create/{{$track_id}}" method="post">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Material name*</label>
                                        <input type="text" class="form-control required" name="material_name" required>
                                    </div>
                                </div>
                                    @csrf
                                <div class="form-line">
                                    <label class="form-label">Unit of measure*</label>
                                    <select required name="units" class="form-control required ">
                                        <option disabled selected >--select--</option>
                                        @foreach(json_decode(\App\Setting::where('key','units_of_measure')->first()->value) as $key=>$val)

                                            <option value="{{$val}}">{{$val}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <label class="form-label">Variants</label>
                                    <br/>
                                    <br/>
                                    <div class="form-row" id="output">

                                    </div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#variants">Open configurations</button>
                                </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6"></div>
                </div>
            </div>


        </section>
        <div class="modal fade" id="variants" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Material variant setup</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-row">
                            <div class="form-group col-md-4">
                                <label >Variant option</label>
                                <input id="variant_option"  name="variant_option" type="text" class="form-control"  placeholder="e.g Color, etc">
                            </div>
                            <div class="form-group col-md-8">
                                <label >Option Value&nbsp;<small>Enter comma separated values</small></label>
                                <input id="option_value"  type="text" name="option_value" class="form-control inputtags"  >
                            </div>

                        </form>

                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button onclick="saveVariants()" type="button" class="btn btn-primary">Save</button>
                        <button onclick="displayVariants()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
