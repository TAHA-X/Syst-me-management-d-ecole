<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;
use App\Models\TypeDocument;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['title','description',"id_type_document"];
    public function etudiant(){
        return $this->belongsTo(User::class,"id_etudiant");
    }

    public function type_document(){
        return $this->belongsTo(TypeDocument::class,"id_type_document");
    }
}
