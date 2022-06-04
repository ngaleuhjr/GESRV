<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{

    protected $fillable=array('medecin','user','libelle','date');
    public static $rules=array('medecin'=>'required|integer',
                                'user  '=>'required|bigInteger',
                                'libelle'=>'required|min:20',
                               'date'=>'required|min:3');
  
    public function medecins()
    {
        return $this->belongsTo(Medecin::class);;
    }
    public function users()
    {
        return $this->belongsTo(User::class);;
    }
    use HasFactory;
}
