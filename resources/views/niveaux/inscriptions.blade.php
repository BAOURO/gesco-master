@extends('layouts.admin')
@section('main-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Inscriptions des etudiants a une classe</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> </a>
</div>
<div class="row">
    
    <div class="col-md-6">
        <div class="form-group focused">
            <label class="form-control-label" for="evaluation">Annee</label>
            <select id="evaluation" class="form-control" name="evaluation">
                <option disabled>Annees</option>
                @foreach($annees as $key)
                    <option value="{{$key->id}}">{{ $key->annee}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group focused">
            <label class="form-control-label" for="parcours">Parcours</label>
            <select id="parcours" class="form-control" name="parcours">
                <option value="0">-- Niveaux --</option>
                @foreach($niveaux as $key)
                    <option value="{{$key->id}}">{{ $key->abreviation.', '.$key->nom}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@endsection