@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Formulaire d\'enregistrement des Rendezvous') }}</div>
                  @if (isset($confirmation))
                   @if ($confirmation==1)
                   <div class="alert alert-success">Rendezvous ajoute</div>
                   @else
                   <div class="alert laert-danger">Rendezvous non ajoute</div>

                  {{$confirmation}}
                  @endif

                  @endif
                <div class="card-body">
                    
                           <form action="{{route('updaterendezvous')}}"  method="POST">
                                  @csrf
                                   <div class="form-group">
                                        <label class="control-label" for="id">Identifiant </label>
                                        <input type="text" name ="id" id="id" class="form-control" readonly="true" value="{{$rendezvous->id}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="nom">Libelle</label>
                                        <input type="text" name ="libelle" id="libelle" class="form-control" value="{{$rendezvous->libelle}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="date">Date</label>
                                        <input type="date" name ="date" id="date" class="form-control" value="{{$rendezvous->date}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="tel"> medecin</label>
                                        <input type="text" name ="medecin" id="medecin" class="form-control" value="{{$rendezvous->medecin}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="user"> Utilisateur</label>
                                        <input type="text" name ="user" id="user" class="form-control" value="{{$rendezvous->user}}">
                                    </div>
                                    

                                    <div class="form-group">
                                        <input type="submit" name ="envoyer" id="envoyer" value="Envoyer" class="btn btn-success"/>
                                        <a class="btn btn-danger" href="{{route('getAllrendezvous')}}">Annuler</a>

                                    </div>
              
                            </form>
                
                </div>   
                                          
                            
            </div>
        </div>
    </div>
</div>
@endsection
