@extends('layouts.app')
@section('main-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Enregistrement des enseignants</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> </a>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="{{ route('enseignants.create') }}" method="post">
            @csrf
            <div class="form-group focused">
                <label class="form-control-label" for="noms_prenoms">Noms et Prenoms</label>
                <input type="text" name="noms_prenoms" required class="form-control">
            </div>
            <div class="form-group focused">
                <label class="form-control-label" for="grade">Grade</label>
                <select id="grade" class="form-control" name="grade">
                    <option disabled>Grade</option>
                    <option value="Professeur">Professeur</option>
                    <option value="Maitre de conference">Maitre de conference</option>
                    <option value="Charge de Cours">Charge de Cours</option>
                    <option value="Assistant">Assistant</option>
                </select>            
            </div>
            <div class="form-group focused">
                <label class="form-control-label" for="titre">Titre</label>
                <select id="titre" class="form-control" name="titre">
                    <option disabled>Titres</option>
                    <option value="Pr">Pr</option>
                    <option value="Dr">Dr</option>
                    <option value="M.">M.</option>
                    <option value="Mme">Mme</option>
                </select>             
            </div>
            <div class="form-group focused">
                <label class="form-control-label" for="domaine">Domaine</label>
                <input type="text" name="domaine" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Valider</button>
        </form>
    </div>
    
</div>
@endsection