<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassicController extends Controller
{
    function index(string $dificuldade)
    {
        return view("classic/index", [
            "dificuldade" => $dificuldade
        ]);
    }

    function image(Request $request){
        $dificuldade = $request->dificuldade;
        $tentativas = $request->attemps ?? 0;

        $caminho = storage_path("app/public/python.png");

        if(!file_exists($caminho)){
            abort(404, "Imagem não encontrada.");

    }

    echo "Deu certo";
    
 }
}