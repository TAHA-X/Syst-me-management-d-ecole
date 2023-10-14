<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;
use App\Models\Certificat;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = ['id_etudiant','id_certificat','status'];

    public function etudiant(){
        return $this->belongsTo(User::class,"id_etudiant");
    }

    public function certificat(){
        return $this->belongsTo(Certificat::class,"id_certificat");
    }
}
