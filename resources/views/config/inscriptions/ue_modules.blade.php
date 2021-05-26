@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-md-6">
        <h5 class="page-header">INSCRIPTION DES UNITES A UN NIVEAU</h5>
    </div>
    <div class="col-md-3">
        <a href="{{ route('inscriptions.ue_niveau')}}" class="btn btn-primary">
            LISTE DES UNITES PAR NIVEAUX
        </a>
    </div>
    <div class="col-md-3">
        <a href="" class="btn btn-primary">
            INSCRIRE LES UEs AUX MODULES
        </a>
    </div>
</div>
<form action="{{ route('inscriptions.ue_modules')}}" method="post">
    @csrf
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Annees
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <select name="annee_id" class="form-control" id="annee_id" required>
                        <option value="0">--Annees--</option>
                        @foreach($annees as $key)
                            <option value="{{$key->id}}">{{$key->annee_debut.'/'.$key->annee_fin}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Modules
                        </div>
                    </div>
                </div>
                <div class="form-group">
                	<select name="module" class="form-control" id="module" required>
                		<option value="0">--Modules--</option>
                        @foreach($modules as $key)
                            <option value="{{$key->id}}">{{$key->nom}}</option>
                        @endforeach
                	</select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DES UNITES D'ENSEIGNEMETNS</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>CODE</th>
                        <th>INITUTLE</th>
                        <th>CREDITS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>CODE</th>
                        <th>INITUTLE</th>
                        <th>CREDITS</th>
                        <th>ACTION</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td align="center">
                            <i>La Liste des unites sera affichee ici !!!</i>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div align="center">
            <button id="Valider" class="btn btn-success">Valider</button>
        </div>
    </div>
</div>
</form>
<script type="text/javascript">
    var modules = <?= json_encode($modules)?>;
    var donnees = {};
    var data = {};
    var k = 0;
    var j = 0;
    $('#annee_id').change(function(){
        data['annee_id'] = $(this).val();
    })

    $('#module').change(function(){
        data['module'] = $(this).val();
    })

    $('#module').change(function(){
        var c = $(this).val();
        var modul = search_module(c);
        //console.log(modul);
        var annee_id = $('#annee_id').val();
        if( annee_id == 0){
            swal({
                title: 'Information',
                type: 'error',
                html: 'VERIFIEZ QUE VOUS AVEZ SELECTIONNNE L\'ANNEE !!!',
            })
            $(this).val(0);
        }
        else{
            donnees = {
                annee_id: annee_id,
                _token: '{{csrf_token()}}',
                niveau: modul.niveau_id
            };
            $.ajax({
                url: "{{ route('inscriptions.getue_niveau') }}",
                type:'POST',
                dataType: "json",
                data: donnees,
                success: function(data) {
                    console.log(data);
                    var ues = data.ues;
                    $('tbody').empty();
                    k = 1;
                    var texte = '';
                    $.each(ues, function(key, val){
                        texte += "<tr>";
                        texte += "<td style='width:2%'>"+k+"</td>";
                        texte += "<td>"+val.code+"</td>";
                        texte += "<td>"+val.intitule+"</td>";
                        texte += "<td>"+val.credit+"</td>";
                        texte += "<td><input type='checkbox' class='form-control' name='ue"+val.id+"' value='"+val.id+"'/></td>";
                        texte += "</tr>";
                        k += 1;
                    })
                    $('tbody').append(texte);
                },
                error: function(data){
                    console.log(data);
                }
            });
        }
    })
    function search_module(id){
        var m = 0;
        $.each(modules, function(key, val){
            if (parseInt(val.id) == parseInt(id)) {
                m = val;
            }
        })
        return m;
    }

    
    //tel: (+237) 222 22 27 28
</script>

@endsection 