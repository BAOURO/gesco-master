@extends('layouts.admin')

@section('main-content')

    <div class="container">
        <div class="col-lg-12">
            <h1 class="page-header">Parcours</h1>
        </div>

        <div class="row">

            <div class="col-lg-4">
                @include('config.parcours.create')
            </div>

            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Abreviation(s)</th>
                                    <th>Mentions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parcours as $parcour)
                                <tr class="odd gradeX">
                                    <td>{{$parcour->id}}</td>
                                    <td>{{$parcour->nom}}</td>
                                    <td>{{$parcour->abreviation}}</td>
                                    <td>{{$parcour->mention->nom}}</td>
                                    <td class="center">
                                        <button type="button" class="btn btn-primary btn-circle">
                                            <a href="{{ route('parcours.show', $parcour) }}" >
                                                <i class="fa fa-list"></i>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-info btn-circle">
                                            <a href="{{ route('parcours.edit', $parcour) }}" >
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-circle">
                                            <form method="POST" action="{{ route('parcours.destroy', $parcour) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" hidden="hidden">
                                            </form>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>

        </div>
    </div>

@endsection