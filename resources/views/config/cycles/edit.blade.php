@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <div class="col-lg-6 justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editer un Cycle</h3>
                </div>
                <div class="card-body">
                    <form role="form" action="{{route('cycles.update', $cycle)}}" method="POST">
                        @csrf
                        @method('PATCH')
                            <div class="form-group">
                                <label for="nom">Nom du Cycle</label>
                                <input class="form-control" name="nom" id="nom" type="text" value="{{$cycle->nom}}">
                            </div>
                            <div class="form-group">
                                <label for="abreviation">Abreviation du Cycle</label>
                                <input class="form-control" name="abreviation" id="abreviation" type="text" value="{{$cycle->abreviation}}">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Modifier"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
