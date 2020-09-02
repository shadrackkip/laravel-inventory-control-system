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
                   <div class="card-header">
                       Products
                   </div>
                   <div class="card-body">
                       <div class="text-right">
                           <a href="/admin/inventory/create_product/{{request()->stock_id}}" class="btn btn-link  btn-primary">New product</a>
                       </div>

                       <div class="row">
                           <div class="table-responsive">
                               <table class="table table-striped" id="table-1">
                                   <thead>
                                   <tr>
                                       <th class="text-center">
                                           #
                                       </th>
                                       <th>Name</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach(\App\Product::orderBy('id','DESC')->get() as $key=>$att)
                                       <tr>
                                           <td>
                                               {{$key+1}}
                                           </td>
                                           <td>{{$att->name}}</td>


                                           <td>

                                                   <span class="badge badge-success headerBadge2">active </span>

                                           </td>
                                           <td>
                                               <a href="/admin/inventory/product/view/{{$att->id}}" class="btn btn-primary">View</a>
                                               <a href="/admin/inventory/product/edit/{{$att->id}}" class="btn btn-secondary">Add materials</a>
                                           </td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </section>
    </div>
@endsection
