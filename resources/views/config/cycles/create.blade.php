<div class="card">
    <div class="card-header">
        <h3 class="card-title">Nouveau Cycle</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('cycles.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="nom">Nom du Cycle</label>
                    <input class="form-control" name="nom" id="nom" type="text" autofocus>
                </div>
                <div class="form-group">
                    <label for="abreviation">Abreviation du Cycle</label>
                    <input class="form-control" name="abreviation" id="abreviation" type="text">
                </div>
                <input type="submit" class="btn btn-primary" value="Enregister"/>
        </form>
    </div>
</div>