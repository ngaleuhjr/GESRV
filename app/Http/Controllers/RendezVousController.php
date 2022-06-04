<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rendezvous;
use App\Models\Medecin;
use Illuminate\Support\Facades\Auth;



class RendezVousController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function add()
    {
        $medecin=Medecin::all();
        return view('rendezvous.add',['medecin'=>$medecin]);
    }
    public $timestamps = false;


    public function getAll()
    {
        $listerendezvous=Rendezvous::all();

        return view('rendezvous.list',['listerendezvous'=>$listerendezvous]);
    }

    public function edit($id)
    {
        $rendezvous=Rendezvous::find($id);
        return view('rendezvous.edit',['rendezvous'=>$rendezvous]);
    }

    public function update(Request $request)
    {
        $rendezvous= Rendezvous::find($request-> id);
        $rendezvous->libelle=$request->libelle;
        $rendezvous->date=$request->date;
        $rendezvous->medecin=$request->medecin;
        $rendezvous->user=Auth::id();

        $result= $rendezvous->save();
        return redirect('/rendezvous/getAll');

    }

    public function delete($id)
    {
        $rendezvous=Rendezvous::find($id);
        if($rendezvous!=null)
        {
            $rendezvous->delete();
        }
        return redirect('/rendezvous/getAll');

    }

    public function persist(Request $request)
    {
          $rendezvous=new Rendezvous();
          $rendezvous->libelle=$request->libelle;
          $rendezvous->date=$request->date;
          $rendezvous->medecin=$request->medecin;
          $rendezvous->user=Auth::id();
         


          $result= $rendezvous->save();
          $medecin=Medecin::all();



        return view('rendezvous.add',['confirmation'=>$result,'medecin'=>$medecin]);
    }
}
