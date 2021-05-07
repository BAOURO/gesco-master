@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                @include('cycles.create')
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cycles
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Abréviation</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cycles as $cycle)
                                    <tr>
                                        <td>{{$cycle->id}}</td>
                                        <td>{{$cycle->nom}}</td>
                                        <td>{{$cycle->abreviation}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button>
                                            <button type="button" class="btn btn-info btn-circle"><i class="fa fa-check"></i></button>
                                            <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
        </div>
    </div>
@endsection