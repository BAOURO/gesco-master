@extends('layouts.notes')
@section('main-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Enregistrement des notes</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> </a>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group focused">
            <label class="form-control-label" for="name">UE<span class="small text-danger"></span></label>
            <select id="ue" class="form-control" name="ue">
                <option>Unité</option>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group focused">
            <label class="form-control-label" for="evaluation">Evaluation</label>
            <select id="evaluation" class="form-control" name="evaluation">
                <option disabled>Evaluations</option>
                @foreach($evaluations as $key)
                    <option value="{{$key->id}}">{{ $key->abreviation}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group focused">
            <label class="form-control-label" for="parcours">Parcours</label>
            <select id="parcours" class="form-control" name="parcours">
                <option value="0">-- Parcours --</option>
                @foreach($parcours as $key)
                    <option value="{{$key->id}}">{{ $key->abreviation}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group focused">
            <label class="form-control-label" for="niveau">Classe</label>
            <select id="niveau" class="form-control" name="niveau">
                <option>Niveau</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 form-box">
      
      <form role="form" action="" method="post" class="registration-form">
        <?php $k = 1;?>
        @foreach($etudiants as $etud)
        @if($k % 10 == 1)
        <fieldset>
          <div class="form-top">
            <div class="form-top-left">
              <h3>Liste des etudiants</h3>
            </div>
          </div>
          <div class="form-bottom">
              <div class="table-responsive">
                <table class="table table-bordered" id="">
                    <thead>
                        <tr>
                            <th style="font-size: 16px;">No</th>
                            <th style="font-size: 16px">Matricule</th>
                            <th style="font-size: 16px">Noms et prenoms</th>
                            <th style="font-size: 16px">Genre</th>
                            <th style="font-size: 16px">Date de naissance</th>
                            <th style="font-size: 16px">Note</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th style="font-size: 16px">No</th>
                            <th style="font-size: 16px">Matricule</th>
                            <th style="font-size: 16px">Noms et prenoms</th>
                            <th style="font-size: 16px">Genre</th>
                            <th style="font-size: 16px">Date de naissance</th>
                            <th style="font-size: 16px">Note</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                        <tr>
                            <td>{{ $k++ }}</td>
                            <td>{{$etud->matricule}}</td>
                            <td>{{$etud->nom}}</td>
                            <td>{{$etud->sexe}}</td>
                            <td>{{$etud->date_naissance}}</td>
                            <td><input type="number" name="note{{$key->id}}" step="0.00" min="0" max="20"></td>
                        </tr>
              @else
                  @if($k % 10 != 0)
                      <tr>
                            <td>{{ $k++ }}</td>
                            <td>{{$etud->matricule}}</td>
                            <td>{{$etud->nom}}</td>
                            <td>{{$etud->sexe}}</td>
                            <td>{{$etud->date_naissance}}</td>
                            <td><input type="number" name="note{{$key->id}}" step="0.00" min="0" max="20"></td>
                        </tr>
                  @else
                      @if($k/10 == 1)
                      <tr>
                            <td>{{ $k++ }}</td>
                            <td>{{$etud->matricule}}</td>
                            <td>{{$etud->nom}}</td>
                            <td>{{$etud->sexe}}</td>
                            <td>{{$etud->date_naissance}}</td>
                            <td><input type="number" name="note{{$key->id}}" step="0.00" min="0" max="20"></td>
                        </tr>
                    </tbody>
                </table>
              </div>
              <button type="button" class="btn btn-next">Next</button>
            </div>
      </fieldset>
                    @else
                             <tr>
                                  <td>{{ $k++ }}</td>
                                  <td>{{$etud->matricule}}</td>
                                  <td>{{$etud->nom}}</td>
                                  <td>{{$etud->sexe}}</td>
                                  <td>{{$etud->date_naissance}}</td>
                                  <td><input type="number" name="note{{$key->id}}" step="0.00" min="0" max="20"></td>
                              </tr>
                          </tbody>
                      </table>
                    </div>
                    <button type="button" class="btn btn-previous">Previous</button>
                      <button type="button" class="btn btn-next">Next</button>
                  </div>
            </fieldset>
                  @endif
              @endif
          @endif
      @endforeach
      @if((($k%10) - 1) < 10)
                          </tbody>
                      </table>
                    </div>
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="submit" class="btn">Sign me up!</button>
                  </div>
            </fieldset>
      @endif
    
    </form>
    
    </div>
</div>
<script type="text/javascript">
    var niveaux = <?= json_encode($niveaux);?>;
    var etudiants = <?= json_encode($etudiants);?>;
    function search_niveau(id) {
        // body...
        niveau = "<option value='0'>-- Niveau --</option>";
        $.each(niveaux, function(key, val){
            //console.log(val);
            if (parseInt(val.parcour_id) == parseInt(id)) {
                //console.log(val);
                niveau += "<option value='"+val.id+"'>"+val.abreviation+" "+val.nom+"</option>";
            } 
        })
        $('#niveau').empty();
        $('#niveau').append(niveau);
    }
    $('#parcours').change(function(){
        var valeur = $('#parcours').val();
        //console.log(valeur);
        search_niveau(valeur);
    })

    $('#niveau').change(function(){
      var n = $(this).val();
      $.ajax({
           type:'POST',
           url:"{{ route('etudiants.getEtudiants') }}",
           data:{_token: '{{csrf_token()}}', niveau:n},
           success:function(data){
              console.log(data.success);
           }
        });
    })
</script>
@endsection