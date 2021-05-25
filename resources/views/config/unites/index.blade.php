@extends('layouts.admin')

@section('main-content')
<div class="col-md-12">
    <h1 class="page-header">UNITES D'ENSEIGNEMENTS</h1>
</div>

<div class="row">

    <div class="col-md-5">
        @include('config.unites.create')
    </div>

    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>CODE</th>
                            <th>INTITULE</th>
                            <th>CREDITS</th>
                            <th>NOMBRE D'HEURE</th>
                            <th>%TPE</th>
                            <th>%TP</th>
                            <th>%CC</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $k = 1 ?>
                        @foreach ($unites as $key)
                        <tr class="odd gradeX">
                            <td>{{$k++}}</td>
                            <td>{{$key->code}}</td>
                            <td>{{$key->intitule}}</td>
                            <td>{{$key->credit}}</td>
                            <td>{{$key->nb_heure}}</td>
                            <td>{{$key->tpe}}</td>
                            <td>{{$key->tp}}</td>
                            <td>{{$key->cc}}</td>
                            <td class="center">
                                <span class='btn btn-info btn-circle' data-toggle='modal' data-target='#unite' id='{{$key->id}}'>
                                    <i class="fa fa-edit"></i>
                                </span>
                                <button type="button" class="btn btn-danger btn-circle">
                                    <form method="POST" action="{{ route('unites.destroy', $key) }}" style="display: none;">
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
                {{   $unites->links() }}
            </div>

            <!-- /.panel-body -->
        </div>
    </div>

</div>
<div class="modal fade" id="unite" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" ></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('unites.update', 0)}}" id="formu1">
                    @csrf
                    <div class="form-group">
                        <label for="code">CODE</label>
                        <input class="form-control" name="code" type="text" required id="code"> 
                    </div>
                    <div class="form-group">
                        <label for="nom">INTITULE</label>
                        <input class="form-control" name="intitule" id="intitule" type="text" required> 
                    </div>
                    <div class="form-group">
                        <label for="nom">NOMBRE DE CREDITS</label>
                        <input class="form-control" name="credits" type="number" required id="credits" min="2"> 
                    </div>
                    <div class="form-group">
                        <label for="nom">NOMBRE D'HEURE</label>
                        <input class="form-control" name="nb_heure" type="number" required min="45" id="nb_heure"> 
                    </div>
                    <div class="form-group">
                        <label for="nom">COEFFICIENT</label>
                        <input class="form-control" name="coef" type="number" id="coef" min="0"> 
                    </div>
                    <div class="form-group">
                        <label for="nom">% TPE (Mettz 0 si cela n'existe pas)</label>
                        <input class="form-control" name="tpe" type="number" required id="tpe" min="0"> 
                    </div>
                    <div class="form-group">
                        <label for="nom">% TP (Mettz 0 si cela n'existe pas)</label>
                        <input class="form-control" name="tp" type="number" required id="tp" min="0"> 
                    </div>
                    <div class="form-group">
                        <label for="nom">% CC (Mettz 0 si cela n'existe pas)</label>
                        <input class="form-control" name="cc" type="number" required id="cc" min="0"> 
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
    var unites = <?= json_encode($unites)?>;
    function search_unites(id){
        var c = 0;
        $.each(unites.data, function(key, val){
            if (parseInt(val.id) == parseInt(id)) {
                c = val;
            }
        })
        return c;
    }
    $('#unite').on('show.bs.modal', function (event)
    {
        console.log('test');
        var button = $(event.relatedTarget);
        var modal = $(this);
        console.log(modal);
        var unites_id = button[0].id;
        var unite = search_unites(unites_id);
        //console.log(unite);
        $("#intitule").val(unite.intitule);
        $("#code").val(unite.code);
        $("#credits").val(unite.credit);
        $("#nb_heure").val(unite.nb_heure);
        $("#coef").val(unite.coef);
        $("#cc").val(unite.cc);
        $("#tp").val(unite.tp);
        $("#tpe").val(unite.tpe);
        var elem = document.getElementById('formu1');
        var action = elem.action;
        elem.action = action.substring(0, action.length - 1)+unites_id;
        modal.find('.modal-title').text("MODIFICATION D'UNE UNITE D'ENSEIGNEMENT ")
    })

    $('#formu1').submit(function(event){
        event.preventDefault();
        //var _token = $("input[name='_token']").val();
        var donnees = {
            _token: '{{csrf_token()}}',
            code: $("#code").val(),
            intitule: $("#intitule").val(),
            credit: $("#credits").val(),
            nb_heure: $("#nb_heure").val(),
            coef: $("#coef").val(),
            cc: $("#cc").val(),
            tp: $("#tp").val(),
            tpe: $("#tpe").val(),
        };
        //var address = $("#address").val();
        //console.log(nom, abreviation);
        //console.log($(this).attr('action'));
        $.ajax({
            url: $(this).attr('action'),
            type:'POST',
            dataType: "json",
            data: donnees,
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
                    '<a style="color:white" href="{{ route('unites.index') }}"><i class="fa fa-check"></i> OK</a>',
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