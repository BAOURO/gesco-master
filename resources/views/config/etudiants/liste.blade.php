@extends('layouts.admin')

@section('main-content')
<div class="row">
    <div class="col-md-9">
        <h3 class="page-header">ETUDIANTS</h3>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
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
                		@foreach($mentions as $key)
                			<option value="{{$key->id}}">{{$key->abreviation}}</option>
                		@endforeach
                	</select>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
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
    <div class="col-xl-4 col-md-6 mb-4">
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
    </div>
</div>
<div class="modal fade" id="etudiant_show" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" ></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                	<div class="col-md-4">
                		<p id="matricule"></p>
                	</div>
                	<div class="col-md-4">
                		<p id="nom"></p>
                	</div>
                	<div class="col-md-4">
                		<p id="prenom"></p>
                	</div>
                </div>
                <div class="row">
                	<div class="col-md-4">
                		<p id="genre"></p>
                	</div>
                	<div class="col-md-4">
                		<p id="cycle"></p>
                	</div>
                	<div class="col-md-4">
                		<p id="mention"></p>
                	</div>
                	
                </div>
                <div class="row">
                	<div class="col-md-4">
                		<p id="date_naissance"></p>
                	</div>
                	<div class="col-md-4">
                		<p id="lieu_naissance"></p>
                	</div>
                	<div class="col-md-4">
                		<p id="tel"></p>
                	</div>
                </div>
                <div class="row">
                	<div class="col-md-4">
                		<p id="adresse"></p>
                	</div>
                	<div class="col-md-4">
                		<p id="situation_mat"></p>
                	</div>
                	<div class="col-md-4">
                		<p id="profession"></p>
                	</div>
                </div>
                <div class="row">
                	<div class="col-md-4">
                		<p id="pays"></p>
                	</div>
                	<div class="col-md-4">
                		<p id="region"></p>
                	</div>
                	<div class="col-md-4">
                		<p id="profession"></p>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

	var parcours = <?= json_encode($parcours)?>;
	var niveaux = <?= json_encode($niveaux)?>;
	var etudiants = {};
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

	function search_etudiant(id){
		var c = 0;
        $.each(etudiants, function(key, val){
            if (parseInt(val.id) == parseInt(id)) {
                c = val;
            }
        })
        return c;
	}

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
	};
	$('#niveau').change(function(){
		var c = $(this).val();
		var texte = '';
		var donnees = {
			niveau: c,
			_token: '{{csrf_token()}}',
			parcours: $('#parcours').val(),
			mention: $('#mention').val()
		}
		$.ajax({
            url: "{{ route('etudiants.getetudiants') }}",
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
                	texte += "<td><span class='btn btn-warning btn-circle' data-toggle='modal' data-target='#etudiant_show' id='"+val.id+"'><i class='fa fa-eye'></i></span>&ensp;&ensp;&ensp;&ensp;<span class='btn btn-info btn-circle' data-toggle='modal' data-target='#etudiant' id='"+val.id+"'><i class='fa fa-edit'></i></span></td>";
                	texte += "</tr>";
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