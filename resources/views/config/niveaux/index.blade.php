@extends('layouts.admin')

@section('main-content')

    <div class="container">
        <div class="col-lg-12">
            <h1 class="page-header">Niveaux</h1>
        </div>

        <div class="row">

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Nouveau Niveau</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{route('niveaux.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="parcour_id">Selectionner Parcours</label>
                                <select name="parcour_id" class="form-control" id="parcour_id">
                                    @foreach ($parcours as $parcour)
                                        <option value="{{ $parcour->id }}">{{ $parcour->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom Niveau</label>
                                <input class="form-control" name="nom" id="nom" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="abreviation">Abreviation Niveau</label>
                                <input class="form-control" name="abreviation" id="abreviation" type="text">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Enregister"/>
                        </form>
                    </div>
                </div>
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
                                    <th>Parcours</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($niveaux as $niveau)
                                <tr class="odd gradeX">
                                    <td>{{$niveau->id}}</td>
                                    <td>{{$niveau->nom}}</td>
                                    <td>{{$niveau->abreviation}}</td>
                                    <td>{{$niveau->parcour->nom}}</td>
                                    <td class="center">
                                        <button type="button" class="btn btn-primary btn-circle">
                                            <a href="{{ route('niveaux.show', $niveau) }}" >
                                                <i class="fa fa-list"></i>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-info btn-circle">
                                            <a href="{{ route('niveaux.edit', $niveau) }}" >
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-circle">
                                            <form method="POST" action="{{ route('niveaux.destroy', $niveau) }}" style="display: none;">
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

@endsection