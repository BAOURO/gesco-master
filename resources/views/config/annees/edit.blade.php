<div class="card">
    <form action="{{ route('annees.update') }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label class="form-control-label" for="annee_debut">Annee debut</label>
            <input type="text" name="annee_debut" class="form-control" value="{{$annee->annee_debut}}" >
        </div>
        <div class="form-group">
            <label class="form-control-label" for="annee_fin">Annee fin</label>
            <input type="text" name="annee_fin" class="form-control" value="{{$annee->annee_fin}}" >
        </div>
        <button type="submit" class="btn btn-success">Modifier</button>
    </form>
</div>