@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-md-9">
        <h3 class="page-header">Modules</h3>
    </div>
    <div class="col-md-3">
        <a href="{{ route('inscriptions.ue_modules')}}" class="btn btn-primary">
            INSCRIRE LES UEs AUX MODULES
        </a>
    </div>
</div>
<div class="row">

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nouveau Module</h3>
            </div>
            <div class="card-body">
                <form role="form" action="{{route('modules.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="parcour_id">Niveau</label>
                        <select name="niveau_id" class="form-control" id="niveau_id">
                            <option>--Niveaux--</option>
                            @foreach ($niveaux as $n)
                                <option value="{{ $n->id }}">{{ $n->abreviation }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom du module</label>
                        <input required placeholder="Nom du module" class="form-control" name="nom" id="nom" type="text" autofocus>
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
                            <th>Nombre de credits</th>
                            <th>Nombre d'unites</th>
                            <th>Niveau</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($modules as $m)
                        <tr class="odd gradeX">
                            <td>{{$m->id}}</td>
                            <td>{{$m->nom}}</td>
                            <td>{{$m->nombre_unites}}</td>
                            <td>{{$m->nombre_credits}}</td>
                            <td>{{$m->niveau->abreviation}}</td>
                            <td class="center">
                                <span class='btn btn-warning btn-circle' data-toggle='modal' data-target='#module_show' id='{{$m->id}}'>
                                    <i class="fa fa-eye"></i>
                                </span>
                                <span class='btn btn-info btn-circle' data-toggle='modal' data-target='#module_update' id='{{$m->id}}'>
                                    <i class="fa fa-edit"></i>
                                </span>
                                <button type="button" class="btn btn-danger btn-circle">
                                    <form method="POST" action="{{ route('modules.destroy', $m) }}" style="display: none;">
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
            {{ $modules->links()}}
        </div>
    </div>

</div>
<div class="modal fade" id="module_update" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" ></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('modules.update', 0)}}" id="formu1">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom du module</label>
                        <input class="form-control" name="nom" id="nom_update" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="abreviation">Nombre de credits</label>
                        <input class="form-control" name="nombre_credits" id="nombre_credits_update" type="number" required placeholder="Nombre des credits">
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
<div class="modal fade" id="module_show" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" ></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Liste des Unites d'enseignements</p>
                <table class="table table-responsive table-bordered table-condensed">
                    <thead>
                        <th>No</th>
                        <th>CODE</th>
                        <th>INTITULE</th>
                        <th>CREDITS</th>
                    </thead>
                    <tbody id="ues"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var modules = <?= json_encode($modules)?>;
    function search_modules(id){
        var c = 0;
        $.each(modules.data, function(key, val){
            if (parseInt(val.id) == parseInt(id)) {
                c = val;
            }
        })
        return c;
    }
    $('#module_update').on('show.bs.modal', function (event)
    {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var module_id = button[0].id;
        var modul = search_modules(module_id);
        //console.log(modules.nom);
        $("#nom_update").val(modul.nom);
        $("#nombre_credits_update").val(modul.nombre_credits);
        var elem = document.getElementById('formu1');
        var action = elem.action;
        elem.action = action.substring(0, action.length - 1)+module_id;
        modal.find('.modal-title').text("MODIFICATION D'UN MODULE ")
    })

    $('#module_show').on('show.bs.modal', function (event)
    {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var module_id = button[0].id;
        var modul = search_modules(module_id);
        //console.log(modul.nom);
        $("#nom_module").html("MODULE: "+modul.nom);
        $.ajax({
            url: "{{ route('modules.getunites') }}",
            type:'POST',
            dataType: "json",
            data: {_token: '{{csrf_token()}}', module:module_id},
            success: function(data) {
                //console.log(data);
                //console.log(data);
                var ues = data.unites;
                $('#ues').empty();
                k = 1;
                var texte = '';
                $.each(ues, function(key, val){
                    texte += "<tr>";
                    texte += "<td style='width:2%'>"+k+"</td>";
                    texte += "<td>"+val.code+"</td>";
                    texte += "<td>"+val.intitule+"</td>";
                    texte += "<td>"+val.credit+"</td>";
                    texte += "</tr>";
                    k += 1;
                })
                $('#ues').append(texte);
            },
            error: function(data){
                console.log(data);
            }
        });
        modal.find('.modal-title').text("MODULE: "+modul.nom)
    })

    $('#formu1').submit(function(event){
        event.preventDefault();
        //var _token = $("input[name='_token']").val();
        var nom = $("#nom_update").val();
        var nombre_credits = $("#nombre_credits_update").val();
        //var address = $("#address").val();
        //console.log(nom, abreviation);
        //console.log($(this).attr('action'));
        $.ajax({
            url: $(this).attr('action'),
            type:'POST',
            dataType: "json",
            data: {_token: '{{csrf_token()}}', nom:nom, nombre_credits:nombre_credits},
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
                    '<a style="color:white" href="{{ route('modules.index') }}"><i class="fa fa-check"></i> OK</a>',
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