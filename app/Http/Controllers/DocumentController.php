<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TypeDocument;


class DocumentController extends Controller
{
    public function documents_list()
    {   
        $documents = document::all();
        $documents_list = view("dashboard.etudiant.documents.components.list", compact("documents"));
        return $documents_list;
    }
    public function index()
    {

        $documents_list = $this->documents_list()->render();
        return view("dashboard.etudiant.documents.index", compact("documents_list"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = TypeDocument::all();
        return view("dashboard.etudiant.documents.pages.add",compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $document = new document();
        $document->id_etudiant = auth()->user()->id;
        $document->title = $request->title;
        $document->id_type_document = $request->id_type_document;
        $file =  $request->file("document");
        $filename=Str::uuid().$file->getClientOriginalName();
        $file->move(public_path("assets/documents"),$filename);
        $path = '/assets/documents/'.$filename;
        $document->document = $path;
        $document->save();
        return redirect()->route("etudiant.documents.index")->with("message", "document est ajouté avec succé");
    }

    /**
     * Display the specified resource.
     */
    public function destroy(string $id)
    {
        $document = document::where("id", $id)->first();
        if ($document) {
            $document->delete();
            return redirect()->route("etudiant.documents.index")->with("message", "document est supprimé avec succé");
        } else {
            return redirect()->route("etudiant.documents.index");
        }
    }

   public function dowload($id){
        $file = Document::where("id",$id)->first()->document;
        return response()->download(public_path($file));
   }

    public function show(string $id)
    {
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     */
     

    /**
     * Remove the specified resource from storage.
     */
}
