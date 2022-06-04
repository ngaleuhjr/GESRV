<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;
use Illuminate\Pagination\Paginator;


class MedecinController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public $timestamps = false;

    
    
   
    public function add()
    {
        
        return view('medecin.add');
    }

    public function getAll()
    {
        //$listemedecins=Medecin::paginate(2);
        $listemedecins=Medecin::all();

        return view('medecin.list',['listemedecins'=>$listemedecins]);
    }

    public function edit($id)
    {
        $medecin=Medecin::find($id);
        return view('medecin.edit',['medecin'=>$medecin]);
    }

    public function update(Request $request)
    {
        $medecin= Medecin::find($request-> id);
          $medecin->nom=$request->nom;
          $medecin->prenom=$request->prenom;
          $medecin->telephone=$request->telephone;
          $result= $medecin->save();

          return redirect('/medecin/getAll');
    }

    public function delete($id)
    {
        $medecin=Medecin::find($id);
        if($medecin!=null)
        {
            $medecin->delete();
        }
        return $this->getAll();
    }

    public function persist(Request $request)
    {
          $medecin=new Medecin();
          $medecin->nom=$request->nom;
          $medecin->prenom=$request->prenom;
          $medecin->telephone=$request->telephone;
         


          $result= $medecin->save();


        return view('medecin.add',['confirmation'=>$result]);
    }
}
