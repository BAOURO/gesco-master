@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                @include('config.departements.create')
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Departements
                    </div>
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
                                    @foreach ($departements as $departement)
                                    <tr>
                                        <td>{{$departement->id}}</td>
                                        <td>{{$departement->nom}}</td>
                                        <td>{{$departement->chef_lieu}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-circle">
                                                <a href="{{ route('departements.show', $departement) }}" >
                                                    <i class="fa fa-list"></i>
                                                </a>
                                            </button>
                                            <button type="button" class="btn btn-info btn-circle">
                                                <a href="{{ route('departements.edit', $departement) }}" >
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-circle">
                                                <form method="POST" action="{{ route('departements.destroy', $departement) }}" style="display: none;">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection