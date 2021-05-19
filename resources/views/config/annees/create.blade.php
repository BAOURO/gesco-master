<div class="card">
    <form action="{{ route('annees.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label class="form-control-label" for="annee_debut">Annee debut</label>
            <input type="text" name="annee_debut" required class="form-control">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="annee_fin">Annee fin</label>
            <input type="text" name="annee_fin" required class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>