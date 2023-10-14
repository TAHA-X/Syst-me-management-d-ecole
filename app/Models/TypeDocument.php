<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Document;

class TypeDocument extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function documents(){
        return $this->hasMany(Document::class,"id_type_document");
    }
}
