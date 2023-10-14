<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Document;
use App\Models\Demande;


class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ['prenom','nom','email','password'];

  
}
