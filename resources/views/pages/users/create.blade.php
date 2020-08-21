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
                            <form action="/admin/users/add" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate="">
                                <div class="card-header">
                                    <h4>Create System User</h4>
                                    <small>All marked fields are required</small>
                                </div>
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Full names</label>
                                        <input name="names" type="text" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            What's his/her name?
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
                                    <div class="form-group">
                                        <label for="role">Choose Role</label>
                                        <select name="role" required="required" id="role" class="custom-select">
                                            <option value="0" disabled selected>--Select--</option>
                                            <option value="admin">Admin</option>
                                            <option value="procurement_officer">Procurement officer</option>

                                        </select>
                                    </div>
                                    <div class="custom-file">
                                        <input accept="image/*" type="file" name="avatar" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose profile photo</label>
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
