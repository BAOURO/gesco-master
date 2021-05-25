<div class="card border-left-success shadow h-100 py-2">
    <div class="card-header">
        <h3 class="card-title">Nouveau Enseignant</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('unites.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">CODE</label>
                        <input class="form-control" name="code" type="text" required placeholder="CODE DE L'UE"> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nom">NOMBRE DE CREDITS</label>
                        <input class="form-control" name="credits" type="number" required min="2" placeholder="NOMBRE D'HEURES"> 
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nom">INTITULE</label>
                        <input class="form-control" name="intitule" type="text" required placeholder="INTITULE"> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nom">NOMBRE D'HEURE</label>
                        <input class="form-control" name="nb_heure" type="number" required min="45" placeholder="NOMBRE D'HEURES"> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nom">COEFFICIENT</label>
                        <input class="form-control" name="coef" type="number" min="0" placeholder="COEFFICIENT"> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nom">% TPE (Mettz 0 si cela n'existe pas)</label>
                        <input class="form-control" name="tpe" type="number" required min="0" placeholder="%TPE"> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nom">% TP (Mettz 0 si cela n'existe pas)</label>
                        <input class="form-control" name="tp" type="number" required min="0" placeholder="%TP"> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nom">% CC (Mettz 0 si cela n'existe pas)</label>
                        <input class="form-control" name="cc" type="number" required min="0" placeholder="%CC"> 
                    </div>
                </div>
            </div>
            
            <button class="btn btn-primary" type="submit">Valider</button>
        </form>
    </div>
</div>