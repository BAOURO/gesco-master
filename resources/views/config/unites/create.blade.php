<div class="card">
    <div class="card-header">
        <h3 class="card-title">Nouveau Enseignant</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('unites.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">INTITULE</label>
                <input class="form-control" name="intitule" type="text" required> 
            </div>
            <div class="form-group">
                <label for="nom">NOMBRE DE CREDITS</label>
                <input class="form-control" name="credits" type="number" required min="2"> 
            </div>
            <div class="form-group">
                <label for="nom">NOMBRE D'HEURE</label>
                <input class="form-control" name="nb_heure" type="number" required min="45"> 
            </div>
            <div class="form-group">
                <label for="nom">COEFFICIENT</label>
                <input class="form-control" name="coef" type="number" min="0"> 
            </div>
            <div class="form-group">
                <label for="nom">% TPE (Mettz 0 si cela n'existe pas)</label>
                <input class="form-control" name="tpe" type="number" required min="0"> 
            </div>
            <div class="form-group">
                <label for="nom">% TP (Mettz 0 si cela n'existe pas)</label>
                <input class="form-control" name="tp" type="number" required min="0"> 
            </div>
            <div class="form-group">
                <label for="nom">% CC (Mettz 0 si cela n'existe pas)</label>
                <input class="form-control" name="cc" type="number" required min="0"> 
            </div>
            <button class="btn btn-primary" type="submit">Valider</button>
        </form>
    </div>
</div>