<div class="card">
    <div class="card-header">
        <h3 class="card-title">Nouveau Sub Menu</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('submenus.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="menu_item_id">Select Menu Item</label>
                    <select name="menu_item_id" class="form-control" id="menu_item_id">
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nom">Nom du Sub Menu Item</label>
                    <input class="form-control" name="name" id="name" type="text" autofocus>
                </div>
                <div class="form-group">
                    <label for="nom">Nom du link</label>
                    <input class="form-control" name="link" id="link" type="text" autofocus>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="enable">Enable</option>
                        <option value="disable">Disable</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Enregister"/>
        </form>
    </div>
</div>