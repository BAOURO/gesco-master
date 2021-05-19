<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier Departement</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('departements.update')}}" method="POST">
            @csrf
            @method('PATCH')
                <div class="form-group">
                    <label for="nom">Nom du departement</label>
                    <input class="form-control" name="nom" id="nom" type="text" value="{{ $departement->nom }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="abreviation">Chef Lieu</label>
                    <input class="form-control" name="chef_lieu" id="chef_lieu" type="text" value="{{ $departement->chef_lieu }}">
                </div>
                <input type="submit" class="btn btn-primary" value="Modifier"/>
        </form>
    </div>
</div>