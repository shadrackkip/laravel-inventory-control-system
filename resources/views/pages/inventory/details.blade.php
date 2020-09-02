@extends('app')
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
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                       aria-controls="home" aria-selected="true">General Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                       aria-controls="profile" aria-selected="false">Product Recipe</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h5>{{$product->name}}</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item"><b>Category : </b>{{\App\Category::find($product->category)->name}}</li>
                                        <li class="list-group-item"><b>Units of measure:</b> {{$product->unit_of_measure}}</li>
                                        <li class="list-group-item"><b>Default Supplier :</b>Not set</li>
                                        <li class="list-group-item"><b>SKU :</b>{{$product->stock_id}}</li>
                                        <li class="list-group-item"><b>Description :</b> {!! $product->additional_information !!}</li>
                                    </ul>
                                    <br/>
                                    <h4>Products </h4>
                                    <hr/>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Name</th>
                                                <th>Status</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($variations as $key=>$att)
                                                <tr>
                                                    <td>
                                                        {{$key+1}}
                                                    </td>
                                                    <td>{{$att}}</td>


                                                    <td>

                                                        <span class="badge badge-success headerBadge2">active </span>

                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Material Name</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Reorder point</th>
                                                <th scope="col">Stock price</th>
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
                                                    <td>
                                                        {{$material->reorder_point}}
                                                    </td>
                                                    <td>{{$material->stock_cost}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>

        </section>
    </div>
@endsection
