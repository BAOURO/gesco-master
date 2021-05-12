<div class="card">
    <div class="card-header">
        <h3 class="card-title">Nouveau Departement</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('departements.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="nom">Nom du departement</label>
                    <input class="form-control" name="nom" id="nom" type="text" autofocus>
                </div>
                <div class="form-group">
                    <label for="abreviation">Chef Lieu</label>
                    <input class="form-control" name="chef_lieu" id="chef_lieu" type="text">
                </div>
                <input type="submit" class="btn btn-primary" value="Enregister"/>
        </form>
    </div>
</div>