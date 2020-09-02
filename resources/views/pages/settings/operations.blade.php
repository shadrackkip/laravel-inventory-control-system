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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Operations</h4>
                            </div>
                            <div class="card-body">

                                <p>Production process operations</p>
                                <div class="row">

                                    <div class="col-6">
                                        <table class="table">

                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>20%</td>

                                            </tr>

                                            </tbody>
                                        </table>
                                        <form>
                                            <div class="form-group">
                                                <label>Add</label>
                                                <input type="text" class="form-control ">
                                            </div>
                                        </form>

                                    </div>
                                    <div class="col-6">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
