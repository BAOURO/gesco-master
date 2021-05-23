@extends('layouts.admin')

@section('main-content')

    <div class="container">
        <div class="col-lg-12">
            <h1 class="page-header">Enseignants</h1>
        </div>

        <div class="row">

            <div class="col-lg-4">
                @include('config.enseignants.create')
            </div>

            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Titre</th>
                                    <th>Noms et prenoms</th>
                                    <th>Grade</th>
                                    <th>Domaine</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $k = 1 ?>
                                @foreach ($enseignants as $key)
                                <tr class="odd gradeX">
                                    <td>{{$k++}}</td>
                                    <td>{{$key->titre}}</td>
                                    <td>{{$key->noms_prenoms}}</td>
                                    <td>{{$key->grade}}</td>
                                    <td>{{$key->domaine}}</td>
                                    <td class="center">
                                        <span class='btn btn-info btn-circle' data-toggle='modal' data-target='#enseignant' id='{{$key->id}}'>
                                            <i class="fa fa-edit"></i>
                                        </span>
                                        <button type="button" class="btn btn-danger btn-circle">
                                            <form method="POST" action="{{ route('enseignants.destroy', $key) }}" style="display: none;">
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
                        {{   $enseignants->links() }}
                    </div>

                    <!-- /.panel-body -->
                </div>
            </div>

        </div>
    </div>
<div class="modal fade" id="enseignant" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" ></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('enseignants.update', 0)}}" id="formu1">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom du enseignants</label>
                        <input class="form-control" name="noms_prenoms" id="nom_update" type="text" required> 
                    </div>
                    <div class="form-group">
                        <label for="nom">Domaine de rechere</label>
                        <input class="form-control" name="domaine" type="text" required id="domaine_update"> 
                    </div>
                    <div class="form-group">
                        <label for="abreviation">Grade</label>
                        <select name="grade_update" id="grade_update" class="form-control" required>
                            <option disabled>--Grades--</option>
                            <option>ASSISTANT</option>
                            <option>CHARGE DE COURS</option>
                            <option>MAITRE DE CONFERENCES</option>
                            <option>PROFESSEUR</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="abreviation">Titre</label>
                        <select name="titre_update" id="titre_update" class="form-control" required>
                            <option disabled>--Titre--</option>
                            <option>M.</option>
                            <option>Mme</option>
                            <option>Dr</option>
                            <option>Pr</option>
                        </select>
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
    var enseignants = <?= json_encode($enseignants)?>;
    function search_enseignants(id){
        var c = 0;
        $.each(enseignants.data, function(key, val){
            if (parseInt(val.id) == parseInt(id)) {
                c = val;
            }
        })
        return c;
    }
    $('#enseignant').on('show.bs.modal', function (event)
    {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var enseignants_id = button[0].id;
        var enseignants = search_enseignants(enseignants_id);
        //console.log(enseignants);
        $("#nom_update").val(enseignants.noms_prenoms);
        $("#grade_update").val(enseignants.grade);
        $("#titre_update").val(enseignants.titre);
        $("#domaine_update").val(enseignants.domaine);
        var elem = document.getElementById('formu1');
        var action = elem.action;
        elem.action = action.substring(0, action.length - 1)+enseignants_id;
        modal.find('.modal-title').text("MODIFICATION D'UN ENSEIGNANT ")
    })

    $('#formu1').submit(function(event){
        event.preventDefault();
        //var _token = $("input[name='_token']").val();
        var noms_prenoms = $("#nom_update").val();
        var grade = $("#grade_update").val();
        var titre = $("#titre_update").val();
        var domaine = $("#domaine_update").val();
        //var address = $("#address").val();
        //console.log(nom, abreviation);
        //console.log($(this).attr('action'));
        $.ajax({
            url: $(this).attr('action'),
            type:'POST',
            dataType: "json",
            data: {_token: '{{csrf_token()}}', noms_prenoms:noms_prenoms, grade:grade, titre:titre, domaine:domaine},
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
                    '<a style="color:white" href="{{ route('enseignants.index') }}"><i class="fa fa-check"></i> OK</a>',
                  confirmButtonAriaLabel: 'Thumbs up, great!',
                  cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i>',
                  cancelButtonAriaLabel: 'Thumbs down'
                })
                //window.location.replace("{{ route('enseignants.index') }}")
            },
            error: function(data){
                console.log(data);
            }
        });
    })
</script>
@endsection