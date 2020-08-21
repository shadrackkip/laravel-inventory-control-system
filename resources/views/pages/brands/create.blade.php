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
                            <form action="/admin/brands/add" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate="">
                                <div class="card-header">
                                    <h4>Add  brands</h4>
                                    <small>All marked fields are required</small>
                                </div>
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="brand" type="text" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            What's the  name?
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input accept="image/*" type="file" name="brand-logo" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose brand logo(optional)</label>
                                        </div>
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
