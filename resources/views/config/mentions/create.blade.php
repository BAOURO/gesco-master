<div class="card">
    <div class="card-header">
        <h3 class="card-title">Nouveau Mention</h3>
    </div>
    <div class="card-body">
        <form role="form" action="{{route('mentions.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cycle_id">Selectionner Cycle</label>
               <select name="cycle_id" class="form-control" id="cycle_id">
                    @foreach ( $cycles as $item )
                        <option value="{{ $item->id }}">{{ $item->nom }} - {{ $item->abreviation }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nom">Nom Mention</label>
                <input class="form-control" name="nom" id="nom" type="text" autofocus>
            </div>
            <div class="form-group">
                <label for="abreviation">Abreviation Mention</label>
                <input class="form-control" name="abreviation" id="abreviation" type="text">
            </div>
            <input type="submit" class="btn btn-primary" value="Enregister"/>
        </form>
    </div>
</div>