<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Demande;

class Certificat extends Model
{
    use HasFactory;
    protected $fillable = ['title','description'];

    public function demandes(){
        return $this->hasMany(Demande::class,"id_certificat");
    }
}
