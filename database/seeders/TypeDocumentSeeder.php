<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeDocument;

class TypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type1 = new TypeDocument();
        $type1->title = "exercises";
        $type1->save();

        $type2 = new TypeDocument();
        $type2->title = "cours";
        $type2->save();


        $type3 = new TypeDocument();
        $type3->title = "examens";
        $type3->save();

        $type4 = new TypeDocument();
        $type4->title = "rapports";
        $type4->save();
    }
}
