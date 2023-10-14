<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Hash;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
        $etudiant = new Etudiant();
        $etudiant->prenom = "manal";
        $etudiant->nom = "test";
        $etudiant->email = "manal@gmail.com";
        $etudiant->password = Hash::make(12345678);
        $etudiant->save();
    }
}
