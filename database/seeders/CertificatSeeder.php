<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Certificat;

class CertificatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certificat1 = new Certificat();
        $certificat1->title = "attestation de scolarité";
        $certificat1->description = "l'etudiant qui vous voyer son nom est ....";
        $certificat1->save();


        $certificat2 = new Certificat();
        $certificat2->title = "attestation de stage";
        $certificat2->description = "l'etudiant qui vous voyer son nom est ....";
        $certificat2->save();

        $certificat3 = new Certificat();
        $certificat3->title = "attestation de réussite";
        $certificat3->description = "l'etudiant qui vous voyer son nom est ....";
        $certificat3->save();
    }
}
