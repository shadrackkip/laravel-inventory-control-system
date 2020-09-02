@extends('app')
@section('css')
    <link rel="stylesheet" href="/assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/bundles/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/bundles/select2/dist/css/select2.min.css">
    @endsection

@section('js')
    <script src="/assets/bundles/editable-table/mindmup-editabletable.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/editable-table.js"></script>
    <script src="/assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script>
        function getVariations(){
            let material =$('#material').val()
            $('#type_of_mat').html($('#material').val())
            $.ajax({
                method:'GET',
                url:'/admin/getVariations/'+material,
                success:function (resp){
                    console.log(resp)
               $('#materials_vars').html(resp);
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
                <div class="card">
                    <div class="card-header">
                      <h3>Add Ingredients for {{$product->name}}&nbsp;</h3>
                        <br/>
                        <br/>


                    </div>
                    <div class="card-body">
                       <div class="row">
                           <div class="col-6">
                               <form action="/admin/create_ingredients/{{$product->id}}" method="POST" >

                                   @csrf
                                   <div class="form-group">
                                       <div class="form-line">
                                           <label class="form-label">Material*</label>
                                           <select id="material" onchange="getVariations()" required name="material" class="form-control required select2">
                                               <option disabled selected >--select--</option>
                                               @foreach(\App\Material::orderBy('id')->get() as $material)

                                                   <option value="{{$material->id}}">{{$material->name}}</option>
                                               @endforeach

                                           </select>
                                       </div>
                                   </div>
                                   <div id="materials_vars">

                                   </div>
                                   <div class="form-group">
                                       <div class="form-line">
                                           <label class="form-label">Quantity</label>
                                           <p>Enter quantity of material selected to be used.</p>
                                           <input type="number" min="0" class="form-control required" name="qty" required>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <div class="form-line">
                                           <label class="form-label">Re-order Point</label>
                                           <input min="0" type="number" class="form-control required" name="re_order_point" required>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <div class="form-line">
                                           <label class="form-label">Purchase price</label>
                                           <input min="0" type="number" class="form-control required" name="stock_cost" required>
                                       </div>
                                   </div>
                                   <div class="form-group text-right">
                                       <button class="btn btn-primary" type="submit">Submit</button>
                                   </div>
                               </form>
                           </div>
                           <div class="col-6">
                               <table class="table">
                                   <thead>
                                   <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Material Name</th>
                                       <th scope="col">Qty</th>
                                       <th scope="col">Reorder point</th>
                                       <th scope="col">Purchase price</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach(\App\MaterialProduct::where('product_id',$product->id)->get() as $key=>$material)
                                   <tr>
                                       <th scope="row">{{$key+1}}</th>
                                       <td>
                                           {{\App\Material::find($material->material_id)->name}}
                                       </td>
                                       <td>{{$material->qty}} {{\App\Material::find($material->material_id)->units}}</td>

                                       <td>{{$material->reorder_point}}</td>
                                       <td>{{$material->stock_cost}}</td>
                                   </tr>
                                   @endforeach

                                   </tbody>
                               </table>
                           </div>

                        </div>
{{--                        <div class="table-responsive">--}}
{{--                            <table id="mainTable" class="table table-striped">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>Material of product</th>--}}
{{--                                    <th>Quantity</th>--}}
{{--                                    @foreach(\App\Variation::where('stock_id',$product->stock_id)->get() as $variation)--}}
{{--                                        @foreach(json_decode($variation->variations) as $attr)--}}
{{--                                    <th>Product: {{$attr->name}}</th>--}}
{{--                                        @endforeach--}}
{{--                                    @endforeach--}}
{{--                                    <th>Amount</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach(\App\Material::orderBy('id')->get() as $material)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$material->name}}</td>--}}
{{--                                    <td>100</td>--}}
{{--                                    <td>200</td>--}}
{{--                                    <td>0</td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                <tr>--}}
{{--                                    <th>--}}
{{--                                        <strong>TOTAL</strong>--}}
{{--                                    </th>--}}
{{--                                    <th>1290</th>--}}
{{--                                    <th>1420</th>--}}
{{--                                    <th>5</th>--}}
{{--                                </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
