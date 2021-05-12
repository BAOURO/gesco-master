<div class="card">
    <form action="{{ route('annees.update') }}" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="annee_debut">Annee debut</label>
                    <input type="text" name="annee_debut" required class="form-control">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="annee_fin">Annee fin</label>
                    <input type="text" name="annee_fin" required class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Modifier</button>
    </form>
</div>