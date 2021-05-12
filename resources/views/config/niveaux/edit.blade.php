<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier Niveau</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('niveaux.update')}}" method="POST">
            @csrf
            @method('PATCH')
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
                <input class="form-control" name="nom" id="nom" type="text" value="{{$niveau->nom}}" autofocus>
            </div>
            <div class="form-group">
                <label for="abreviation">Abreviation Niveau</label>
                <input class="form-control" name="abreviation" id="abreviation" value="{{$niveau->abreviation}}" type="text">
            </div>
            <input type="submit" class="btn btn-primary" value="Modifier"/>
        </form>
    </div>
</div>