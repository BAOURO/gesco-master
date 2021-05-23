<div class="card">
    <div class="card-header">
        <h3 class="card-title">Nouveau Enseignant</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('enseignants.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom et prenom de l'enseignant</label>
                <input class="form-control" name="noms_prenoms" type="text" required> 
            </div>
            <div class="form-group">
                <label for="nom">Domaine de rechere</label>
                <input class="form-control" name="domaine" type="text" required> 
            </div>
            <div class="form-group">
                <label for="abreviation">Grade</label>
                <select name="grade" class="form-control" required>
                    <option disabled>--Grades--</option>
                    <option>ASSISTANT</option>
                    <option>CHARGE DE COURS</option>
                    <option>MAITRE DE CONFERENCES</option>
                    <option>PROFESSEUR</option>
                </select>
            </div>
            <div class="form-group">
                <label for="abreviation">Titre</label>
                <select name="titre" class="form-control" required>
                    <option disabled>--Titre--</option>
                    <option>M.</option>
                    <option>Mme</option>
                    <option>Dr</option>
                    <option>Pr</option>
                </select>
            </div>
            <button class="btn btn-primary">Valider</button>
        </form>
    </div>
</div>