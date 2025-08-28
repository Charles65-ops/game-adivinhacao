<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech&display=swap" rel="stylesheet">

    @vite('resources/css/classic/index.css')
    @vite('resources/js/classic/index.js')
</head>

<body style="background-color:rgb(151, 0, 0)">
<div id="app" data-dificuldade="{{ $dificuldade }}"></div>
    <div id="image" data-image="{{ $tecnologia }}"></div>

    <div class="container">
        <div class="row">
            <h1 class="game-name">CODLE</h1>
            <p class="game-difficulty">{{ $dificuldade }}</p>
        </div>
    </div>

    <img id="guess-image" class="img-portrait" alt="Imagem a ser adivinhada"/>
    <div class="container-vidas">
        <span>☕</span>
        <span>☕</span>
        <span>☕</span>
        <span>☕</span>
        <span>☕</span>
        <div class="select-container">
        <div class="select-container">
    <select id="tec-select">
        @foreach ($tecnologias as $tec)
            <option value="{{ $tec->codigo}}">{{ $tec->nome }}</option>
        @endforeach
    </select>
</div>


    <!-- Botão Adivinhar -->
    <div class="buttons-container">
        <button class="button" id="guess-button">Adivinhar</button>
    </div>
</div>