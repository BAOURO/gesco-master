@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-md-4">
        <h5 class="page-header">INSCRIPTION DES ETUDIANTS A UN NIVEAU</h5>
    </div>
    <div class="col-md-2">
        <a href="{{ route('inscriptions.ue_niveau')}}" class="btn btn-primary">
            INSCRIRE LES UEs AUX NIVEAUX
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('etudiants.liste')}}" class="btn btn-warning">
            <i class="fa fa-list"></i> VOIR LISTE
        </a>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            CYCLE</div>
                    </div>
                </div>
                <div class="form-group">
                    <select name="cycle" class="form-control" id="cycle" required>
                        <option value="0">--Cycles--</option>
                        @foreach($cycles as $key)
                            <option value="{{$key->id}}">{{$key->abreviation}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Mention</div>
                    </div>
                </div>
                <div class="form-group">
                	<select name="mention" class="form-control" id="mention" required>
                		<option value="0">--Mentions--</option>
                	</select>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Parcours</div>
                    </div>
                </div>
                <div class="form-group">
                	<select name="parcours" class="form-control" id="parcours" required>
                		<option value="0">--Parcours--</option>
                	</select>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
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
                	</select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des etdutiants</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>MATRICULE</th>
                        <th>NOMS</th>
                        <th>PRENOMS</th>
                        <th>DATE DE NAISSANCE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>MATRICULE</th>
                        <th>NOMS</th>
                        <th>PRENOMS</th>
                        <th>DATE DE NAISSANCE</th>
                        <th>ACTION</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td align="center">
                        	<i>La Liste des etudiants sera affichee ici !!!</i>
                        </td>
                        <td></td>
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

<script type="text/javascript">

    var mentions = <?= json_encode($mentions)?>;
	var parcours = <?= json_encode($parcours)?>;
	var niveaux = <?= json_encode($niveaux)?>;
	var etudiants = {};
	function convert_date(dateObject) {
        var d = new Date(dateObject);
        var day = d.getDate();
        var month = d.getMonth() + 1;
        var year = d.getFullYear();
        if (day < 10) {
            day = "0" + day;
        }
        if (month < 10) {
            month = "0" + month;
        }
        var date = day + "/" + month + "/" + year;

        return date;
    }

    function search_etudiant(id){
        var c = 0;
        $.each(etudiants, function(key, val){
            if (parseInt(val.id) == parseInt(id)) {
                c = val;
            }
        })
        return c;
    }


    $('#mention').change(function(){
		var texte = '<option value="0">--Parcours--</option>';
		var c = $(this).val();
		$.each(parcours, function(key, val){
			if (parseInt(c) == val.mention_id) {
				texte += "<option value='"+val.id+"'>"+val.abreviation+"</option>";
			}
		})
		$('#parcours').empty();
		$('#parcours').append(texte);
	})

	$('#etudiant_show').on('show.bs.modal', function (event)
    {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var et = search_etudiant(button[0].id);
        //console.log(et);
    	$('#matricule').html("Matricule: "+et.matricule);
        $('#nom').html("Nom: "+et.nom); 
        $('#prenom').html("Prenom: "+et.prenom); 
        $('#date_naissance').html("Date de naissance: "+convert_date(et.date_naissance)); 
        $('#lieu_naissance').html("Lieu de naissance: "+et.lieu_naissance);
        $('#genre').html("Genre: "+et.sexe); 
        $('#tel').html("Telephone: "+et.telephone); 
        $('#situation_mat').html("Situation matrimoniale: "+et.situation_mat); 
        $('#profession').html("profession: "+et.profession);
        $('#pays').html("Pays: "+et.pays_id);
        $('#region').html("Region: "+et.region_id);
        /*$('#nom_pere').val();
        $('#tel_pere').val(); 
        $('#adresse_pere').val(); 
        $('#profession_pere').val();
        $('#residence_pere').val(); 
        $('#nom_mere').val(); 
        $('#tel_mere').val(); 
        $('#adresse_mere').val(); 
        $('#profession_mere').val(); 
        $('#nom_tuteur').val(); 
        $('#tel_tuteur').val(); 
        $('#adresse_tuteur').val(); 
        $('#profession_tuteur').val();*/
        $('#cycle').html("Cycle: "+et.cycle_id);
        $('#mention').html("Mention: "+et.mention_id);
        modal.find('.modal-title').text("VISUALISATION ETUDIANT")
    })

	$('#etudiant_show').on('show.bs.modal', function (event)
    {
        var button = $(event.relatedTarget);
        var modal = $(this);
        
        modal.find('.modal-title').text("MODIFICATION D'UN ETUDIANT")
    })

    $('#cycle').change(function(){
        var texte = '<option value="0">--Mentions--</option>';
        var c = $(this).val();
        $.each(mentions, function(key, val){
            if (parseInt(c) == val.cycle_id) {
                texte += "<option value='"+val.id+"'>"+val.abreviation+"</option>";
            }
        })
        $('#mention').empty();
        $('#mention').append(texte);
    })

	$('#parcours').change(function(){
		var texte = '<option value="0">--Niveaux--</option>';
		var c = $(this).val();
		$.each(niveaux, function(key, val){
			if (parseInt(c) == val.parcour_id) {
				texte += "<option value='"+val.id+"'>"+val.abreviation+"</option>";
			}
		})
		$('#niveau').empty();
		$('#niveau').append(texte);
	})
	
	$('#niveau').change(function(){
		var c = $(this).val();
		var texte = '';
		var donnees = {
			_token: '{{csrf_token()}}',
			cycle: $('#cycle').val(),
			mention: $('#mention').val()
		}
		$.ajax({
            url: "{{ route('etudiants.getetudiant_mention') }}",
            type:'POST',
            dataType: "json",
            data: donnees,
            success: function(data) {
                etudiants = data.etudiants;
                $('tbody').empty();
                var k = 1;
                $.each(data.etudiants, function(key, val){
                	texte += "<tr>";
                	texte += "<td style='width:2%'>"+k+"</td>";
                	texte += "<td>"+val.matricule+"</td>";
                	texte += "<td>"+val.nom+"</td>";
                	texte += "<td>"+val.prenom+"</td>";
                	texte += "<td>"+convert_date(val.date_naissance)+"</td>";
                	texte += "<td><input type='checkbox' class='form-control' name='"+val.id+"' value='"+val.id+"'/></td>";
                	texte += "</tr>";
                	k += 1;
                })
                $('tbody').append(texte);
            },
            error: function(data){
                console.log(data);
            }
        });
	})
</script>
@endsection