@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <div class="row">

            <div class="col-lg-4">
                @include('config.cycles.create')
            </div>

            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cycles
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Abréviation</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $k = 1; ?>
                                    @foreach ($cycles as $cycle)
                                    <tr>
                                        <td>{{$k++}}</td>
                                        <td>{{$cycle->nom}}</td>
                                        <td>{{$cycle->abreviation}}</td>
                                        <td>
                                            <span class='btn btn-info btn-circle' data-toggle='modal' data-target='#cycle' id='{{$cycle->id}}'>
                                                <i class="fa fa-edit"></i>
                                            </span>
                                            <a href="{{ route('cycles.destroy', $cycle) }}" class="btn btn-danger btn-circle">
                                                
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<div class="modal fade" id="cycle" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" ></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('cycles.update', 0)}}" id="formu1">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="nom">Nom du Cycle</label>
                        <input class="form-control" name="nom" id="nom_update" type="text">
                    </div>
                    <div class="form-group">
                        <label for="abreviation">Abreviation du Cycle</label>
                        <input class="form-control" name="abreviation" id="abreviation_update" type="text">
                            </div>
                  <div class="modal-footer">
                      <button type="submit" id="confirmer" class="btn btn-success">Modifier</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var cycles = <?= json_encode($cycles)?>;
    function search_cycle(id){
        var c = 0;
        $.each(cycles, function(key, val){
            if (parseInt(val.id) == parseInt(id)) {
                c = val;
            }
        })
        return c;
    }
    $('#cycle').on('show.bs.modal', function (event)
    {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var cycle_id = button[0].id;
        var cycle = search_cycle(cycle_id);
        console.log(cycle.nom);
        $("#nom_update").val(cycle.nom);
        $("#abreviation_update").val(cycle.abreviation);
        var elem = document.getElementById('formu1');
        var action = elem.action;
        elem.action = action.substring(0, action.length - 1)+cycle_id;
        modal.find('.modal-title').text("MODIFICATION D'UN CYCLE ")
    })
</script>
@endsection