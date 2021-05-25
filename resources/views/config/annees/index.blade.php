@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <div class="row">
            
            <div class="col-lg-4">
                @include('config.annees.index')
            </div>

            <div class="col-lg-8">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>  
                                    <th>Annee Debut</th>
                                    <th>Annee Fin</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Annee Debut</th>
                                    <th>Annee Fin</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($annees as $annee)
                                <tr>
                                    <td>{{ $annee->id }}</td>
                                    <td>{{ $annee->annee_debut }}</td>
                                    <td>{{ $annee->annee_fin }}</td>
                                    <td>
                                        <span class='btn btn-info btn-circle' data-toggle='modal' data-target='#annee' id='{{$annee->id}}'>
                                            <i class="fa fa-edit"></i>
                                        </span>
                                        <span class="btn btn-danger btn-circle">
                                            <a href="{{ route('annees.destroy', $annee->id) }}">   
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </span> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $annees->links() }}
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
                <form method="post" action="{{route('annees.update', 0)}}" id="formu1">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label class="form-control-label" for="annee_debut_update">Annee debut</label>
                        <input type="text" name="annee_debut_update" id="annee_debut_update" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="annee_fin_update">Annee fin</label>
                        <input type="text" name="annee_fin_update" id="annee_fin_update" required class="form-control">
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
    var annees = <?= json_encode($annees)?>;
    function search_annee(id){
        var an = 0;
        $.each(annees, function(key, val){
            if (parseInt(val.id) == parseInt(id)) {
                an = val;
            }
        })
        return an;
    }
    $('#annee').on('show.bs.modal', function (event)
    {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var annee_id = button[0].id;
        var annee = search_annee(annee_id);

        $("#annee_debut_update").val(annee.annee_debut);
        $("#annee_fin_update").val(annee.annee_fin);

        var elem = document.getElementById('formu1');
        var action = elem.action;
        elem.action = action.substring(0, action.length - 1)+annee_id;
        modal.find('.modal-title').text("MODIFICATION D'UNE ANNEE ")
    })
</script>
@endsection
