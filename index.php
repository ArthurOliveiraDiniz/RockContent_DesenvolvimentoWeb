<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade Diagnóstica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div id="form-falecom">
        <div id="bt-fechar-form">X</div>
        <div class="titulo">Fale Conosco</div>
        <span>Assunto</span>
        <input id="AssuntoForm" name="assunto" type="text">
        <span>Mensagem</span>
        <textarea id="TextoForm" name="texto"></textarea>
        <div class="bt-nav colored" id="btEnviarForm">Enviar</div>
        <div id="mensagemForm" class=""></div>
    </div>

    <nav id="nav">
        <div class="bt-nav" id="Logo"></div>
        <div class="bt-nav" id="Clientes">Clientes</div>
        <div class="bt-nav" id="Soluções">Soluções</div>
        <div class="bt-nav" id="ProdutosServiços">Produtos e Serviços</div>
        <div class="bt-nav" id="Recursos">Recursos</div>
        <div class="bt-nav" id="Pareceiros">Parceiros</div>
        <div class="bt-nav" id="Sobre">Sobre</div>
        <div class="bt-nav" id="Parceiros">Parceiros</div>
        <div class="bt-nav colored" id="FaleConsultor">Fale com consultor</div>
    </nav>

    <main>
        <div class="container" id="container-1">
            <div id="title">
                <span class="highlight">Impulsione</span> sua <br>empresa com <br><span class="highlight-2">conteúdo que <br>performa</span>
            </div>
            <div id="desc">
                <p>Nossos produtos e serviços permitem que marcas criem <br> estratégias de conteúdo de alta qualidade, que promove <br>reconhecimento e geram receita.</p>
                <br>
                <div class="bt-nav colored">Comece agora</div>
                <div class="bt-nav colored-2">Vamos conversar</div>
            </div>
        </div>
        <div class="container" id="container-2">
            <img src="img/fig1.png" alt="Figura 1">
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>
