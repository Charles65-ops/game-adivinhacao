<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Importando a fonte Catleya do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Catleya&display=swap" rel="stylesheet">

    @vite("resources/css/index/index.css")
    @vite("resources/js/index/index.js")

    <style>
        /* Fonte Catleya para todo o corpo */
        body {
            background-color: rgb(73, 0, 0);
            font-family: 'Catleya', cursive;
            color: #ffffff;
        }

        /* Estilizando a terminal */
        .terminal {
            background-color: rgb(30, 30, 30);
            padding: 20px;
            border-radius: 10px;
            width: 600px;
            margin: 50px auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
        }

        .terminal-line {
            display: flex;
            flex-wrap: wrap;
            font-family: 'Catleya', cursive;
            margin-bottom: 5px;
        }

        .terminal-line span {
            margin-right: 5px;
        }

        .terminal-output {
            margin-left: 10px;
            margin-bottom: 10px;
            font-family: 'Catleya', cursive;
        }

        /* Estilo do input da terminal */
        .terminal-input {
            background-color: transparent;
            border: none;
            color: #ffffff;
            outline: none;
            font-family: 'Catleya', cursive;
            flex: 1;
        }

        /* Cursor piscando */
        .terminal-input::placeholder {
            color: #888;
        }
    </style>
</head>

<body>
    <div class="terminal">
        <div class="terminal-line">
            <span>root</span>@<span>game</span>:
            <span>~</span>$<span> play --help</span>
        </div>
        <div class="terminal-output">
            Play:
            <br>
            Uso: play [modo] [dificuldade]
            <br>
            Modos:
            <br>
            -c, --classic Modo clássico
            <br>
            Opções:
            <br>
            -e, --easy Dificuldade fácil
            <br>
            -m, --medium Dificuldade média
            <br>
            -h, --hard Dificuldade difícil
        </div>
        <div class="terminal-line">
            <span>root</span>@<span>game</span>:
            <span>~</span>$ 
            <input id="userInput" autocomplete="off" class="terminal-input" type="text" placeholder="Digite um comando...">
        </div>
    </div>
</body>

</html>
