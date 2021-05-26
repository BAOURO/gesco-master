@extends('layouts.admin')

@section('main-content')

    <div class="container">
        <div class="col-lg-12">
            <h1 class="page-header">Parcours</h1>
        </div>

        <div class="row">

            <div class="col-lg-4">
                @include('config.parcours.create')
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
                                    <th>Mentions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parcours as $parcour)
                                <tr class="odd gradeX">
                                    <td>{{$parcour->id}}</td>
                                    <td>{{$parcour->nom}}</td>
                                    <td>{{$parcour->abreviation}}</td>
                                    <td>{{$parcour->mention->nom}}</td>
                                    <td class="center">
                                        <span class='btn btn-info btn-circle' data-toggle='modal' data-target='#parcours' id='{{$parcour->id}}'>
                                            <i class="fa fa-edit"></i>
                                        </span>
                                        <button type="button" class="btn btn-danger btn-circle">
                                            <form method="POST" action="{{ route('parcours.destroy', $parcour) }}" style="display: none;">
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
                        <!-- /.table-responsive -->
                        
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>

        </div>
    </div>
<div class="modal fade" id="parcours" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" ></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('parcours.update', 0)}}" id="formu1">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom du parcours</label>
                        <input class="form-control" name="nom" id="nom_update" type="text">
                    </div>
                    <div class="form-group">
                        <label for="abreviation">Abreviation du parcours</label>
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
    var parcours = <?= json_encode($parcours)?>;
    function search_parcours(id){
        var c = 0;
        $.each(parcours.data, function(key, val){
            if (parseInt(val.id) == parseInt(id)) {
                c = val;
            }
        })
        return c;
    }
    $('#parcours').on('show.bs.modal', function (event)
    {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var parcours_id = button[0].id;
        var parcours = search_parcours(parcours_id);
        //console.log(parcours.nom);
        $("#nom_update").val(parcours.nom);
        $("#abreviation_update").val(parcours.abreviation);
        var elem = document.getElementById('formu1');
        var action = elem.action;
        elem.action = action.substring(0, action.length - 1)+parcours_id;
        modal.find('.modal-title').text("MODIFICATION D'UN parcours ")
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
                    '<a style="color:white" href="{{ route('parcours.index') }}"><i class="fa fa-check"></i> OK</a>',
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