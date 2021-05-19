<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier Mention</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('mentions.update', $mention)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="cycle_id">Selectionner Cycle</label>
                <select name="cycle_id" class="form-control" id="cycle_id">
                    @foreach ($cycles as $cycle)
                        <option value="{{ $cycle->id }}">{{ $cycle->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nom">Nom Mention</label>
                <input class="form-control" name="nom" id="nom" value="{{$mention->nom}}" type="text" autofocus>
            </div>
            <div class="form-group">
                <label for="abreviation">Abreviation Mention</label>
                <input class="form-control" name="abreviation" id="abreviation" value="{{$mention->abreviation}}" type="text">
            </div>
            <input type="submit" class="btn btn-primary" value="Modifier"/>
        </form>
    </div>
</div>