<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = "admin";
        $admin->email = "admin@gmail.com";
        $admin->password = Hash::make("12345678");
        $admin->type = 1;
        $admin->save();

        $etudiant = new User();
        $etudiant->name = "etudiant";
        $etudiant->email = "etudiant@gmail.com";
        $etudiant->password = Hash::make("12345678");
        $etudiant->type = 2;
        $etudiant->save();
    }
}
