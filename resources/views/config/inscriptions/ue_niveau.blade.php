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
<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            ANNEE ACADEMIQUE</div>
                    </div>
                </div>
                <div class="form-group">
                    <select name="anne_id" class="form-control" id="annee_id" required>
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
                        @foreach($niveaux as $key)
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
                            SEMESTRE</div>
                    </div>
                </div>
                <div class="form-group">
                    <select name="semestre" class="form-control" id="semestre" required>
                        <option value="0">--SEMESTRES--</option>
                        <option>SEMESTRE 1</option>
                        <option>SEMESTRE 2</option>
                        <option>SEMESTRE 3</option>
                        <option>SEMESTRE 4</option>
                        <option>SEMESTRE 5</option>
                        <option>SEMESTRE 6</option>
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
                    <?php $k = 1; ?>
                    @foreach($ues as $key)
                    <tr>
                        <td>{{$k++}}</td>
                        <td>{{$key->code}}</td>
                        <td>{{$key->intitule}}</td>
                        <td>{{$key->credit}}</td>
                        <td>
                            <input type='checkbox' class='form-control' name='ue{{$key->id}}' value='{{$key->id}}'/>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div align="center">
            <button id="Valider" class="btn btn-success">Valider</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    var donnees = {};
    var k = 0;
    $('input[type=checkbox]').click(function(){
        
        if ($(this).is(':checked')) {
            //console.log($(this).val());
            k += 1;
            donnees['ue'+k] =  $(this).val();
            
        }
        //console.log(donnees);
    })

    $('#annee_id').change(function(){
        donnees['annee_id'] = $(this).val();
    })

    $('#niveau').change(function(){
        donnees['niveau_id'] = $(this).val();
    })

    $('#semestre').change(function(){
        donnees['semestre'] = $(this).val();
    })

    $('#Valider').click(function(){
        if(donnees['annee_id'] === undefined || donnees['niveau_id'] === undefined || donnees['semestre'] === undefined){
            swal({
                title: 'Information',
                type: 'error',
                html: 'VERIFIEZ QUE VOUS AVEZ SELECTIONNNE L\'ANNEE, LE NIVEAU ET LE SEMESTRE !!!',
            })
        }
        else{
            donnees['taille'] = k;
            donnees["_token"] = '{{csrf_token()}}';
            $.ajax({
            url: "{{ route('inscriptions.ue_niveau_post')}}",
            type:'POST',
            dataType: "json",
            data: donnees,
            success: function(data) {
                swal.fire({
                  title: 'Information',
                  icon: 'info',
                  html:
                    'ENREGISTREMENT EFFECTUE AVEC SUCCESS, CLIQUEZ SUR OK POUR SORTIR !!!',
                  showCloseButton: true,
                  showCancelButton: true,
                  focusConfirm: false,
                  confirmButtonText:
                    '<a style="color:white" href="{{ route('inscriptions.ue_niveau_liste') }}"><i class="fa fa-check"></i> OK</a>',
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
        }
    })
    //tel: (+237) 222 22 27 28
</script>

@endsection 