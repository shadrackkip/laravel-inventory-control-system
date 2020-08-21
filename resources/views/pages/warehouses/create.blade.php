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
                            <form action="/admin/warehouses/add" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate="">
                                <div class="card-header">
                                    <h4>Add a warehouse</h4>
                                    <small>All marked fields are required</small>
                                </div>
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="warehouse" type="text" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            What's the  name?
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Status</label>
                                        <select name="status" required="required" id="role" class="custom-select">
                                            <option value="0" disabled selected>--Select--</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>

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
