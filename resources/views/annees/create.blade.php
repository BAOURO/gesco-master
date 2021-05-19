@extends('layouts.admin')
@section('main-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Enregistrements des annees academiques</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> </a>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="{{ route('annees.create') }}" method="post">
            @csrf
            <div class="form-group focused">
                <label class="form-control-label" for="annee">Annee</label>
                <input type="text" name="annee" required class="form-control">
            </div>
            
            <button type="submit" class="btn btn-success">Valider</button>
        </form>
    </div>
    
</div>
@endsection