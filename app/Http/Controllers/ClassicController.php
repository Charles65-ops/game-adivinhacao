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

        $caminho = storage_path("app/public/elixir.png");

        if(!file_exists($caminho)){
            abort(404, "Imagem não encontrada.");

    }

    $extensao = strtolower(pathinfo($caminho, PATHINFO_EXTENSION));

    if(!in_array($extensao, ['jpg', 'png', 'jpeg'])){
        abort(415, "Formato de imagem não suportada.");
    }
    $imagemOriginal = match ($extensao){
        'png' => imagecreatefrompng($caminho),
        default => imagecreatefromjpeg($caminho),

    };

    //PIXELIZAÇÂO - NIVEL 1
    $largura = imagesx($imagemOriginal);
    $altura = imagesy($imagemOriginal);

    $fatorPixelizacao = ((5 + $tentativas) / 100)- 0.02;

    $novaLargura = max(1, intval($largura * $fatorPixelizacao));
    $novaAltura = max(1, intval($altura * $fatorPixelizacao));

    $imagemPequena = imagecreatetruecolor($novaLargura, $novaAltura);
    imagecopyresized($imagemPequena,$imagemOriginal, 
    0, 0, 0, 0, 
    $novaLargura, 
    $novaAltura, 
    $largura, 
    $altura
);

$imagemFinal = imagecreatetruecolor($largura, $altura);
imagecopyresized($imagemFinal,$imagemPequena,
0 ,0 ,0 ,0,
$largura,
$altura,
$novaAltura,
$novaLargura,
);

//RUIDO - NIVEL 2
$tamanhoRudio = ((5 - $tentativas) * 10)/2;
for($i = 0; $i < 150; $i++){
    $x = rand(0, $largura - $tamanhoRudio);
    $y = rand(0, $altura - $tamanhoRudio);
    $cor = imagecolorallocate($imagemFinal, 
    rand(0,255), 
    rand(0,255), 
    rand(0,   255)
);


imagefilledrectangle(
    $imagemFinal,
    $x,
    $y,
    $x + $tamanhoRudio,
    $y + $tamanhoRudio,
    $cor
);
}

//PRETO E BRANCO - 3
imagefilter($imagemFinal, IMG_FILTER_GRAYSCALE);

    ob_start();

    if($extensao == "png"){
        imagepng($imagemFinal);
        $contentType = "image/png";
    }else {
        imagejpeg($imagemFinal);
        $contentType = "image/png";
    }

    $conteudoImagem = ob_get_clean();
    imagedestroy($imagemFinal);

    $base64 = 'data' . $contentType . ';base64,' . base64_encode($conteudoImagem);
    return response()->json([
        "image" => "exemplo",
        "dificuldade" => "Teste",
        "resposta" => "a",
        "vidas" => "a"
    ]);
    
 }

}