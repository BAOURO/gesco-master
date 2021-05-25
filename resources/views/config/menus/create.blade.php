<div class="card">
    <div class="card-header">
        <h3 class="card-title">Nouveau Menu</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('menus.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom du Menu</label>
                <input class="form-control" name="name" id="name" type="text" autofocus>
            </div>
            <div class="form-group">
                <label for="nom">Link du Menu</label>
                <input class="form-control" name="link" id="link" type="text" autofocus>
            </div>
            <div class="form-group">
                <label for="status">Status du Menu</label>
                <select name="status" class="form-control" id="status">
                    <option value="enable">Enable</option>
                    <option value="disable">Disable</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Enregister"/>
        </form>
    </div>
</div>