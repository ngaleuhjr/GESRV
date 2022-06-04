@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Formulaire d\'enregistrement des rendez-vous') }}</div>
                  @if (isset($confirmation))
                   @if ($confirmation==1)
                   <div class="alert alert-success">Rendezvous ajoute</div>
                   @else
                   <div class="alert laert-danger">Rendezvous non ajoute</div>

                  {{$confirmation}}
                  @endif

                  @endif
                <div class="card-body">
                    
                               <form action="{{route('persistrendezvous')}}" method="POST">
                                  @csrf
                                   <div class="form-group">
                                        <label class="control-label" for="libelle">Libelle du rendez-vous</label>
                                        <input type="text" name ="libelle" id="libelle" class="form-control">
                                    </div>

                                    
                                    <div class="form-group">
                                        <label class="control-label" for="prenom">Date du rendez-vous</label>
                                        <input type="date" name ="date" id="date" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="medecin">Choissisez rendez-vous</label>
                                        
                                        <select class="form-control" id="medecin" name="medecin">
                                            <option value="0">Faites un choix</option>
                                        
                                            @foreach($medecin as $medecins)
                                            <option value="{{ $medecins->id}}">{{ $medecins->nom}} {{ $medecins->prenom}}</option>
                                            @endforeach
                                        </select>
                                        
                                        
                                    </div>
                                    
                                     <div class="form-group">
                                         
                                        <input type="submit" name ="envoyer" id="envoyer" value="Envoyer" class="btn btn-success"/>
                                        <input type="reset" name ="reset" id="annuler" value="Annuler " class="btn btn-danger"/>

                                      </div>
                                     
                                    
              
                            </form>
                
                </div>   
                                          
                            
            </div>
        </div>
    </div>
</div>
@endsection
