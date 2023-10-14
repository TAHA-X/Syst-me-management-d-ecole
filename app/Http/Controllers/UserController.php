<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function users_list()
    {
        $etudiants = user::where("type",2)->get();
        $users_list = view("dashboard.admin.etudiant.components.list", compact("etudiants"));
        return $users_list;
    }
    public function index()
    {
        if(auth()->user()->type==2){
            return redirect()->route("etudiant.documents.index");
        }
        $users_list = $this->users_list()->render();
        return view("dashboard.admin.etudiant.index", compact("users_list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("dashboard.admin.etudiant.pages.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "email" => "required",
        ]);
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make(12345678);
        $user->type = 2;
        $user->save();
        return redirect()->route("admin.etudiants.index")->with("message", "etudiant est ajouté avec succé");
    }

    /**
     * Display the specified resource.
     */
    public function destroy(string $id)
    {
        $user = user::where("id", $id)->first();
        if ($user) {
            $user->delete();
            return redirect()->route("admin.etudiants.index")->with("message", "user est supprimé avec succé");
        } else {
            return redirect()->route("admin.etudiants.index");
        }
    }

    public function show(string $id)
    {
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $etudiant = user::where("id", $id)->first();
        if ($etudiant) {
            return view("dashboard.admin.etudiant.pages.edit", compact("etudiant"));
        } else {
            return redirect()->route("admin.etudiants.index");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
   
        $this->validate($request, [
            "name" => "required",
            "email" => "required"
        ]);
     
        $user = user::where("id", $id)->first();
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect()->route("admin.etudiants.index")->with("message", "etudiant est ajouté avec succé");
        } else {
            return redirect()->route("admin.etudiants.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
}
