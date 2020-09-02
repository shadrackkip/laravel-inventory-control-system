@extends('app')

@section('js')
    <script>
        function saveUnit(type){
          let  unit=$('#unit').val();
          let data={
              'key':type,
              'value':unit
          }
            unit!=='' ?
                $.ajax({
                    method:'post',
                    url:'/admin/settings/units_of_measure',
                    data:data,
                    success:function (resp){
                        console.log(resp)
                    },
                    error:function (error){
                        console.log(error)
                    }
                })
                :
                null
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Units of measure</h4>
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-6">
                                        <table class="table">

                                            <tbody>
                                            @foreach(json_decode(\App\Setting::where('key','units_of_measure')->first()->value) as $key=>$val)

                                                <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$val}}</td>

                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                        <form method="POST" action="/admin/settings/units_of_measure" class="needs-validation">
                                            <div class="form-group">
                                                @csrf
                                                <label for="unit">Unit</label>
                                                <input id="unit" name="units_of_measure" required type="text" class="form-control ">
                                            </div>
                                            <div class="card-footer text-right">
                                                <button  type="submit" class="btn btn-primary">Save</button>
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
