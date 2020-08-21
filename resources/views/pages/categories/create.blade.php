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
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <form action="/admin/categories/add" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate="">
                                <div class="card-header">
                                    <h4>Add  product categories</h4>
                                    <small>All marked fields are required</small>
                                </div>
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label> Category name</label>

                                        <input name="category" type="text" class="form-control" required="">
                                        <small>Enter  category name</small>
                                        <div class="invalid-feedback">
                                            What's the  name?
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_cat">Sub category</label>
                                        <small>Choose subcategory ,leave blank if category name is the parent. </small>
                                        <select name="parent" required="required" id="sub_cat" class="custom-select">
                                            <option disabled selected>--Select--</option>
                                            @foreach(\App\Category::all() as $key => $category)
                                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-2">
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
