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
                            <form action="/admin/suppliers/add" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate="">
                                <div class="card-header">
                                    <h4>Add supplier</h4>
                                    <small>All marked fields are required</small>
                                </div>
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Company name</label>
                                        <input name="name" type="text" class="form-control" required="">
                                        <div class="invalid-feedback">
                                           This field is required
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" name="email" type="email" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Oh no! Email is invalid.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone number</label>
                                        <input id="phone" name="phone" type="tel" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Phone number required
                                        </div>
                                    </div>
                                    <div class="custom-file">
                                        <input accept="application/pdf" type="file" name="company-profile" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose company profile (* only pdf is accepted)</label>
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="form-group">
                                    <div class="custom-file">
                                        <input accept="image/*" type="file" name="company-logo" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose company logo(optional)</label>
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
