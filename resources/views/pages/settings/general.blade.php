@extends('app')
@section('css')
    <link rel="stylesheet" href="/assets/bundles/select2/dist/css/select2.min.css">
    @endsection
@section('js')
    <script src="/assets/bundles/select2/dist/js/select2.full.min.js"></script>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>General Settings</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Base Currency</h4>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label>The base currency used for all  operations</label>
                                        <select class="form-control select2">
                                            <option value="KES" selected >KES</option>
                                            <option value="USD">USD</option>
                                            <option value="EUR">EUR</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Default lead time for purchase orders</h4>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input onchange="setLeadTime()" type="number" class="form-control">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    Days
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
