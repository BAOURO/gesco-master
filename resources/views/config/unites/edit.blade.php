<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier Pacours</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('parcours.update')}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="mention_id">Selectionner mention</label>
                <select name="mention_id" class="form-control" id="mention_id">
                    @foreach ($mentions as $mention)
                        <option value="{{ $mention->id }}">{{ $mention->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nom">Nom Parcours</label>
                <input class="form-control" name="nom" id="nom" type="text" value="{{$parcour->nom}}" autofocus>
            </div>
            <div class="form-group">
                <label for="abreviation">Abreviation Parcours</label>
                <input class="form-control" name="abreviation" id="abreviation" value="{{$parcour->abreviation}}" type="text">
            </div>
            <input type="submit" class="btn btn-primary" value="Modifier"/>
        </form>
    </div>
</div>