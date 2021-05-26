@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-md-6">
        <h5 class="page-header">INSCRIPTION DES UNITES A UN NIVEAU</h5>
    </div>
    <div class="col-md-3">
        <a href="{{ route('inscriptions.ue_niveau_liste')}}" class="btn btn-primary">
            LISTE DES UNITES PAR NIVEAUX
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('inscriptions.ue_modules')}}" class="btn btn-primary">
            INSCRIRE LES UEs AUX MODULES
        </a>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            ANNEE ACADEMIQUE</div>
                    </div>
                </div>
                <div class="form-group">
                    <select name="annee_id" class="form-control" id="annee_id" required>
                        <option value="0">--ANNEE ACADEMIQUE--</option>
                        @foreach($annees as $key)
                            <option value="{{$key->id}}">{{$key->annee_debut.'/'.$key->annee_fin}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Niveau
                        </div>
                    </div>
                </div>
                <div class="form-group">
                	<select name="niveau" class="form-control" id="niveau" required>
                		<option value="0">--Niveaux--</option>
                        @foreach($niveaux as $key)
                            <option value="{{$key->id}}">{{$key->abreviation}}</option>
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
                        <th>ANNEE</th>
                        <th>SEMESTRE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>CODE</th>
                        <th>INITUTLE</th>
                        <th>CREDITS</th>
                        <th>ANNEE</th>
                        <th>SEMESTRE</th>
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
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">

    $('#niveau').change(function(){
        var annee_id = $('#annee_id').val();
        var niveau_id = $(this).val();
        if( annee_id == 0){
            swal({
                title: 'Information',
                type: 'error',
                html: 'VERIFIEZ QUE VOUS AVEZ SELECTIONNNE L\'ANNEE !!!',
            })
            $(this).val(0);
        }
        else{
            var donnees = {
                _token: '{{csrf_token()}}',
                annee_id: annee_id,
                niveau_id: niveau_id
            };
            $.ajax({
            url: "{{ route('inscriptions.getues')}}",
            type:'POST',
            dataType: "json",
            data: donnees,
            success: function(data) {
                //console.log(data);
                var ues = data.ues;
                $('tbody').empty();
                var k = 1;
                var texte = '';
                var lien = "";
                $.each(ues, function(key, val){
                    lien = "{{ route('inscriptions.delete',0)}}"+val.id_i;
                    texte += "<tr>";
                    texte += "<td style='width:2%'>"+k+"</td>";
                    texte += "<td>"+val.code+"</td>";
                    texte += "<td>"+val.intitule+"</td>";
                    texte += "<td>"+val.credit+"</td>";
                    texte += "<td>"+val.annee_debut+"/"+val.annee_fin+"</td>";
                    texte += "<td>"+val.semestre+"</td>";
                    texte += "<td><a href='"+lien+"' class='btn btn-danger btn-circle'><i class='fa fa-trash'></></a></td>";
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
    //tel: (+237) 222 22 27 28
</script>

@endsection 