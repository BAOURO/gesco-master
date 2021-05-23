
        <div class="card border-left-primary shadow h-100 py-2">
		    <div class="card-header">
		    	<div class="row">
		    		<div class="col-md-3">
		    			<h4 class="card-title">Nouveau Etudiant</h4>
		    		</div>
		    		<div class="col-md-3">
		    			<a href="" class="btn btn-success">
		    			<i class="fa fa-plus"></i>Enregistrer par excel</a>
		    		</div>
		    		<div class="col-md-3">
		    			<a href="{{ route('etudiants.liste')}}" class="btn btn-primary">
		    			<i class="fa fa-list"></i>Voir liste</a>
		    		</div>
		    	</div>
		        
		    </div>
		    <div class="card-body" style="background: white">
		        <form role="form" action="{{ route('etudiants.store')}}" method="post" class="registration-form" id="mon_form">
            		<fieldset>
                    	<div class="form-top">
                    		<div class="form-top-left">
                    			<h5>Etape 1 / 4</h5>
                        		<p>Etat civil:</p>
                    		</div>
                        </div>
                        <div class="form-bottom" style="background: white">
                    		<div class="row">
                    			<div class="col-md-6">
                    				<div class="form-group">
			                        	<label for="form-last-name">Noms</label>
			                        	<input type="text" name="nom" placeholder="Noms..." class="form-control" id="nom" required>
			                        </div>
                    			</div>
                    			<div class="col-md-6">
                    				<div class="form-group">
			                        	<label for="form-last-name">Prénoms</label>
			                        	<input type="text" name="prenom" placeholder="Prenoms..." class="form-control" id="prenom">
			                        </div>
                    			</div>
                    		</div>
	                        <div class="row">
                    			<div class="col-md-6">
			                        <div class="form-group">
			                        	<label for="date_naissance">Date de naissance</label>
			                        	<input type="date" name="date_naissance" class="form-control" id="date_naissance" required>
			                        </div>
			                    </div>
			                    <div class="col-md-6">
			                        <div class="form-group">
			                        	<label for="date_naissance">Lieu de naissance</label>
			                        	<input type="text" name="lieu_naissance" class="form-control" id="lieu_naissance" required placeholder="Lieu de naissance">
			                        </div>
			                    </div>
			                </div>
	                        
	                        <div class="row">
	                        	<div class="col-md-6">
			                        <div class="form-group">
			                        	<label for="date_naissance">Genre</label>
			                        	<select name="genre" class="form-control" id="genre" required>
			                        		<option disabled>--Genres--</option>
			                        		<option>Masculin</option>
			                        		<option>Feminin</option>
			                        	</select>
			                        </div>
			                    </div>
                    			<div class="col-md-6">
			                        <div class="form-group">
			                        	<label for="tel">Téléphone</label>
			                        	<input type="text" name="tel" class="form-control" id="tel" placeholder="Téléphone" required>
			                        </div>
			                    </div>
			                </div>
			                <div class="row">
	                        	<div class="col-md-6">
			                        <div class="form-group">
			                        	<label for="profession">Profession</label>
			                        	<input type="text" name="profession" class="form-control" id="profession" placeholder="Profession" required/>
			                        </div>
			                    </div>
                    			<div class="col-md-6">
			                        <div class="form-group">
			                        	<label for="situation_mat">Situation matrimoniale</label>
			                        	<input type="text" name="situation_mat" class="form-control" id="situation_mat" placeholder="Situation matrimoniale" required>
			                        </div>
			                    </div>
			                </div>
	                        <button type="button" class="btn btn-next">Next</button>
	                    </div>
                    </fieldset>
                    
                    <fieldset>
						<div class="form-top">
							<div class="form-top-left">
								<h5>Etape 2 / 4</h5>
					    		<p>Informations parentales</p>
							</div>
					    </div>
					    <div class="form-bottom">
					    	<h5>Informations sur le père</h5>
					        <div class="row">
					        	<div class="col-md-6">
					                <div class="form-group">
					                	<label for="nom_pere">Nom</label>
					                	<input type="text" name="nom_pere" class="form-control" placeholder="Noms et prénoms" id="nom_pere"/>
					                </div>
					            </div>
								<div class="col-md-6">
					                <div class="form-group">
					                	<label for="tel_pere">Téléphone</label>
					                	<input type="text" name="tel_pere" class="form-control" placeholder="Téléphone" id="tel_pere">
					                </div>
					            </div>
					        </div>
					        <div class="row">
					        	<div class="col-md-6">
					                <div class="form-group">
					                	<label for="adresse_pere">Adresse</label>
					                	<input type="text" name="adresse_pere" class="form-control" placeholder="Adresse" id="adresse_pere"/>
					                </div>
					            </div>
								<div class="col-md-6">
					                <div class="form-group">
					                	<label for="profession_pere">Profession</label>
					                	<input type="text" name="profession_pere" class="form-control" placeholder="Profession" id="profession_pere">
					                </div>
					            </div>
					        </div>
					        <h5>Informations sur la mère</h5>
					        <div class="row">
					        	<div class="col-md-6">
					                <div class="form-group">
					                	<label for="nom_mere">Nom</label>
					                	<input type="text" name="nom_mere" class="form-control" placeholder="Noms et prénoms" id="nom_mere" required />
					                </div>
					            </div>
								<div class="col-md-6">
					                <div class="form-group">
					                	<label for="tel_mere">Téléphone</label>
					                	<input type="text" name="tel_mere" class="form-control" placeholder="Téléphone" id="tel_mere">
					                </div>
					            </div>
					        </div>
					        <div class="row">
					        	<div class="col-md-6">
					                <div class="form-group">
					                	<label for="adresse_mere">Adresse</label>
					                	<input type="text" name="adresse_mere" class="form-control" placeholder="Adresse" id="adresse_mere" required />
					                </div>
					            </div>
								<div class="col-md-6">
					                <div class="form-group">
					                	<label for="profession_mere">Profession</label>
					                	<input type="text" name="profession_mere" class="form-control" placeholder="Profession" id="profession_mere" required>
					                </div>
					            </div>
					        </div>
					        <div class="form-group">
					    		<label for="residence_parent">Résidence des parents</label>
					        	<input type="text" name="residence_parent" placeholder="Résidence des parents..." class="form-control" id="residence_parent" required>
					        </div>
					        <button type="button" class="btn btn-previous">Previous</button>
					        <button type="button" class="btn btn-next">Next</button>
					    </div>
					</fieldset>

					<fieldset>
						<div class="form-top">
							<div class="form-top-left">
								<h3>Etape 3 / 4</h3>
					    		<p>Informations natales et tuteurs:</p>
							</div>
					    </div>
					    <div class="form-bottom">
					    	<div class="row">
					        	<div class="col-md-6">
					                <div class="form-group">
					                	<label for="pays">Pays</label>
					                	<select name="pays" class="form-control" id="pays" required>
					                		<option value="0">--Pays--</option>
					                		@foreach($pays as $key)
					                			<option value="{{$key->id}}">{{$key->nom}}</option>
					                		@endforeach
					                	</select>
					                </div>
					            </div>
								<div class="col-md-6">
					                <div class="form-group" id="region_pattern">
					                	<label for="tel">Région</label>
					                	<select name="region" class="form-control" id="region" required>
					                		<option disabled>--Région--</option>
					                	</select>
					                </div>
					            </div>
					        </div>
					        <h5>Informations sur le Tuteur</h5>
					        <div class="row">
					        	<div class="col-md-6">
					                <div class="form-group">
					                	<label for="nom_tuteur">Nom</label>
					                	<input type="text" name="nom_tuteur" class="form-control" placeholder="Noms et prénoms" id="nom_tuteur" required />
					                </div>
					            </div>
								<div class="col-md-6">
					                <div class="form-group">
					                	<label for="tel_tuteur">Téléphone</label>
					                	<input type="text" name="tel_tuteur" class="form-control" placeholder="Téléphone" id="tel_tuteur">
					                </div>
					            </div>
					        </div>
					        <div class="row">
					        	<div class="col-md-6">
					                <div class="form-group">
					                	<label for="adresse_tuteur">Adresse</label>
					                	<input type="text" name="adresse_tuteur" class="form-control" placeholder="Adresse" id="adresse_tuteur" required />
					                </div>
					            </div>
								<div class="col-md-6">
					                <div class="form-group">
					                	<label for="profession_tuteur">Profession</label>
					                	<input type="text" name="profession_tuteur" class="form-control" placeholder="Profession" id="profession_tuteur" required>
					                </div>
					            </div>
					        </div>
					        <button type="button" class="btn btn-previous">Previous</button>
					        <button type="button" class="btn btn-next">Next</button>
					    </div>
					</fieldset>

                	<fieldset>
                    	<div class="form-top">
                    		<div class="form-top-left">
                    			<h3>Etape 4 / 4</h3>
                        		<p>Informations académiques:</p>
                    		</div>
                        </div>
                        <div class="form-bottom">
			                <div class="row">
	                        	<div class="col-md-6">
			                        <div class="form-group">
			                        	<label for="matricule">Matricule</label>
			                        	<input type="text" name="matricule" class="form-control" placeholder="Matricule..." id="matricule" required />
			                        </div>
			                    </div>
			                </div>
	                    	<div class="row">
	                        	<div class="col-md-6">
			                        <div class="form-group">
			                        	<label for="cycle">Cycle</label>
			                        	<select name="cycle" class="form-control" id="cycle" required>
			                        		<option value="0">--Cycles--</option>
			                        		@foreach($cycles as $key)
			                        			<option value="{{$key->id}}">{{$key->nom}}</option>
			                        		@endforeach
			                        	</select>
			                        </div>
			                    </div>
                    			<div class="col-md-6">
			                        <div class="form-group">
			                        	<label for="mention">mention</label>
			                        	<select name="mention" class="form-control" id="mention" required>
			                        		<option value="0">--Mentions--</option>
			                        		@foreach($mentions as $key)
			                        			<option value="{{$key->id}}">{{$key->nom}}</option>
			                        		@endforeach
			                        	</select>
			                        </div>
			                    </div>
			                </div>
	                        <button type="button" class="btn btn-previous">Previous</button>
	                        <button type="button" class="btn" id="valider">Enregistrer</button>
	                    </div>
                    </fieldset>
                </form>
		    </div>
		</div>
<script type="text/javascript">
	var pays = <?= json_encode($pays)?>;
	var regions = <?= json_encode($regions)?>;
    function search_pays(id){
        var c = 0;
        $.each(pays, function(key, val){
            if (parseInt(val.id) == parseInt(id)) {
                c = val;
            }
        })
        return c;
    }
	$('#pays').change(function(){
		var valeur = $(this).val();
		var p = search_pays(valeur);
		var texte = '';
		if (p.nom == 'Cameroun') {
			$.each(regions, function(key, val){
				texte += "<option value="+val.id+">"+val.nom+"</option>";
			})
			$('#region').append(texte);
		}
		else{
			$('#region').remove();
			texte = '<input type="text" name="region" placeholder="Région..." class="form-control" id="region" required>';
			$('#region_pattern').append(texte);
		}
	})

	$('#cycle').change(function(){
		var texte = '';
		var mentions = <?= json_encode($mentions)?>;
		var c = $(this).val();
		$.each(mentions, function(key, val){
			if (parseInt(c) == val.cycle_id) {
				texte += "<option value='"+val.id+"'>"+val.abreviation+"<option/>";
			}
		})
		$('#mention').empty();
		$('#mention').append(texte);
	})


	$('#valider').click(function(){
		var donnees = {
			matricule: $('#matricule').val(),
            nom: $('#nom').val(), 
            prenom: $('#prenom').val(), 
            date_naissance: $('#date_naissance').val(), 
            lieu_naissance: $('#lieu_naissance').val(),
            sexe: $('#genre').val(), 
            telephone: $('#telephone').val(), 
            situation_mat: $('#situation_mat').val(), 
            profession: $('#profession').val(),
            pays_id: $('#pays').val(),
            region_id: $('#region').val(), 
            nom_pere: $('#nom_pere').val(),
            tel_pere: $('#tel_pere').val(), 
            adresse_pere: $('#adresse_pere').val(), 
            profession_pere: $('#profession_pere').val(),
            residence_parent: $('#residence_pere').val(), 
            nom_mere: $('#nom_mere').val(), 
            tel_mere: $('#tel_mere').val(), 
            adresse_mere: $('#adresse_mere').val(), 
            profession_mere: $('#profession_mere').val(), 
            nom_tuteur: $('#nom_tuteur').val(), 
            tel_tuteur: $('#tel_tuteur').val(), 
            adresse_tuteur: $('#adresse_tuteur').val(), 
            profession_tuteur: $('#profession_tuteur').val(),
            cycle_id: $('#cycle').val(),
            _token: '{{csrf_token()}}',
            mention_id: $('#mention').val()
		}
        $.ajax({
            url: $('#mon_form').attr('action'),
            type:'POST',
            dataType: "json",
            data: donnees,
            success: function(data) {
                swal.fire({
                  title: 'Information',
                  icon: 'info',
                  html:
                    'VOTRE ENREGISTREMENT S\'EST TERMINE AVEC SUCCESS, CLIQUEZ SUR OK POUR SORTIR !!!',
                  showCloseButton: true,
                  showCancelButton: true,
                  focusConfirm: false,
                  confirmButtonText:
                    '<a style="color:white" href="{{ route('etudiants.index') }}"><i class="fa fa-check"></i> OK</a>',
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
		//console.log(donnees);
		//return false;
	})
</script>