<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificat;
use Barryvdh\DomPDF\Facade\Pdf;

class DemandeController extends Controller
{
    public function demandes_list()
    {
        if(auth()->user()->type==1){
            $demandes = Demande::all();
            $demandes_list = view("dashboard.admin.demandes.components.list", compact("demandes"));
        }
        else{
            $demandes = Demande::where("id_etudiant",auth()->user()->id)->get();
            $demandes_list = view("dashboard.etudiant.demandes.components.list", compact("demandes"));
        }
        return $demandes_list;
    }
    public function index()
    {

        $demandes_list = $this->demandes_list()->render();
        if(auth()->user()->type==1){
            return view("dashboard.admin.demandes.index", compact("demandes_list"));

        }
        else{
            $demandes = Demande::where("id_etudiant",auth()->user()->id)->get();
            return view("dashboard.etudiant.demandes.index", compact("demandes_list"));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $certificats = Certificat::all();
        return view("dashboard.etudiant.demandes.pages.add",compact("certificats"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $demande = new Demande();
        $demande->id_etudiant = auth()->user()->id;
        $demande->id_certificat = $request->id_certificat;
        $demande->save();
        return redirect()->route("etudiant.demandes.index")->with("message", "demande est ajouté avec succé");
    }

    /**
     * Display the specified resource.
     */
    public function destroy(string $id)
    {
        $demande = Demande::where("id", $id)->first();
        if ($demande) {
            $demande->delete();
            return redirect()->route("admin.demandes.index")->with("message", "demande est supprimé avec succé");
        } else {
            return redirect()->route("admin.demandes.index");
        }
    }

    public function refuser($id){
        $demande = Demande::where("id", $id)->first();
        if ($demande) {
            $demande->update(["status"=>3]);
            return redirect()->route("admin.demandes.index")->with("message", "demande est refusé");
        } else {
            return redirect()->route("admin.demandes.index");
        }
    }

    public function accepter($id){
        $demande = Demande::where("id", $id)->first();
        if ($demande) {
            $demande->update(["status"=>2]);
            return redirect()->route("admin.demandes.index")->with("message", "demande est accepté");
        } else {
            return redirect()->route("admin.demandes.index");
        }
    }

    public function show(string $id)
    {
        dd("show");
    }

    public function download($id){
        $certificat = Demande::where("id",$id)->first()->certificat; 
        $etudiant = Demande::where("id",$id)->first()->etudiant;
        $data = [
            "certificat"=>$certificat,
            "etudiant"=>$etudiant,
            "date"=>date('d-m-Y')
        ];
        $pdf = Pdf::loadView('dashboard.etudiant.demandes.certificat', $data);
        return $pdf->download('certificat.pdf');
    }
    /**
     * Show the form for editing the specified resource.
     */
     

    /**
     * Remove the specified resource from storage.
     */
}
