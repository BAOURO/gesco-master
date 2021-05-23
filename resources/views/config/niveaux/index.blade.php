@extends('layouts.admin')

@section('main-content')
<div class="col-lg-12">
    <h1 class="page-header">Niveaux</h1>
</div>

<div class="row">

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nouveau Niveau</h3>
            </div>
            <div class="card-body">
                <form role="form" action="{{route('niveaux.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="parcour_id">Selectionner Parcours</label>
                        <select name="parcour_id" class="form-control" id="parcour_id">
                            @foreach ($parcours as $parcour)
                                <option value="{{ $parcour->id }}">{{ $parcour->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom Niveau</label>
                        <input class="form-control" name="nom" id="nom" type="text" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="abreviation">Abreviation Niveau</label>
                        <input class="form-control" name="abreviation" id="abreviation" type="text">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Enregister"/>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Abreviation(s)</th>
                            <th>Parcours</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($niveaux as $niveau)
                        <tr class="odd gradeX">
                            <td>{{$niveau->id}}</td>
                            <td>{{$niveau->nom}}</td>
                            <td>{{$niveau->abreviation}}</td>
                            <td>{{$niveau->parcour->nom}}</td>
                            <td class="center">
                                <span class='btn btn-info btn-circle' data-toggle='modal' data-target='#niveau' id='{{$niveau->id}}'>
                                    <i class="fa fa-edit"></i>
                                </span>
                                
                                <button type="button" class="btn btn-danger btn-circle">
                                    <form method="POST" action="{{ route('niveaux.destroy', $niveau) }}" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" hidden="hidden">
                                    </form>
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $niveaux->links()}}
        </div>
    </div>

</div>
<div class="modal fade" id="niveau" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" ></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('niveaux.update', 0)}}" id="formu1">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom du niveaux</label>
                        <input class="form-control" name="nom" id="nom_update" type="text">
                    </div>
                    <div class="form-group">
                        <label for="abreviation">Abreviation du niveau</label>
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
    var niveaux = <?= json_encode($niveaux)?>;
    function search_niveaux(id){
        var c = 0;
        $.each(niveaux.data, function(key, val){
            if (parseInt(val.id) == parseInt(id)) {
                c = val;
            }
        })
        return c;
    }
    $('#niveau').on('show.bs.modal', function (event)
    {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var niveau_id = button[0].id;
        var niveau = search_niveaux(niveau_id);
        //console.log(niveaux.nom);
        $("#nom_update").val(niveau.nom);
        $("#abreviation_update").val(niveau.abreviation);
        var elem = document.getElementById('formu1');
        var action = elem.action;
        elem.action = action.substring(0, action.length - 1)+niveau_id;
        modal.find('.modal-title').text("MODIFICATION D'UN NIVEAU ")
    })

    $('#formu1').submit(function(event){
        event.preventDefault();
        //var _token = $("input[name='_token']").val();
        var nom = $("#nom_update").val();
        var abreviation = $("#abreviation_update").val();
        //var address = $("#address").val();
        //console.log(nom, abreviation);
        //console.log($(this).attr('action'));
        $.ajax({
            url: $(this).attr('action'),
            type:'POST',
            dataType: "json",
            data: {_token: '{{csrf_token()}}', nom:nom, abreviation:abreviation},
            success: function(data) {
                swal.fire({
                  title: 'Information',
                  icon: 'info',
                  html:
                    'VOTRE MODIFICATION A ETE PRISE EN COMPTE, CLIQUEZ SUR OK POUR SORTIR !!!',
                  showCloseButton: true,
                  showCancelButton: true,
                  focusConfirm: false,
                  confirmButtonText:
                    '<a style="color:white" href="{{ route('niveaux.index') }}"><i class="fa fa-check"></i> OK</a>',
                  confirmButtonAriaLabel: 'Thumbs up, great!',
                  cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i>',
                  cancelButtonAriaLabel: 'Thumbs down'
                })
                //window.location.replace("{{ route('parcours.index') }}")
            },
            error: function(data){
                console.log(data);
            }
        });
    })
</script>
@endsection