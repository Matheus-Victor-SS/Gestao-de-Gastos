<?php
session_start();

// se NÃO estiver logado
if (!isset($_SESSION['id'])) {

    // tenta recuperar pelo cookie
    if (isset($_COOKIE['id'])) {
        $_SESSION['id'] = $_COOKIE['id'];
    } else {
        header("Location: login.html");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organização Financeira</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
    <h1>ORGANIZAÇÃO</h1>
    <div class="container-pai">
    <div class="caixa">Conteúdo 1</div>
    <div class="caixa">Conteúdo 2</div>
    <div class="caixa">Conteúdo 3</div>
</div>

    <button id="add">ADICIONAR</button>

<dialog id="cont">
    <p>Descrição</p><br>
    <input type="text" id="text">
    <p>Quantia</p><br>
    <input type="number" id="num">
    <p>Categoria</p><br>
    <div id="motivo">
        <div class="item investimento" onclick="selecionar('investimento')">Investimento</div>
        <div class="item viagem" onclick="selecionar('Viagem')">Viagem</div>
        <div class="item casa" onclick="selecionar('Casa')">Casa</div>
        <div class="item compras" onclick="selecionar('Compras')">Compras</div>
        <div class="item carro" onclick="selecionar('Carro')">Carro</div>
        <div class="item outro" onclick="selecionar('Outro')">Outro</div>
    </div>
    <p id="escolhido">Nenhum selecionado</p>
    <br><br>
    <input type="button" value="Guardar" id="btn">
    <input type="button" value="Fechar" id="close">
</dialog>
<table id="tabela">
    <tr>
        <th>Descrição</th>
        <th>Quantia</th>
        <th>Categoria</th>
        <th>Tipo</th>
        <th>Data</th>
        <th>Ação</th>
    </tr>
    <tbody>
        
    </tbody>
</table>
<a href="logout.php">
    <button>Sair</button>
</a>
</center>
    <script src="script.js"></script>
    <?php
session_start();

session_destroy();
setcookie("id", "", time() - 3600);

header("Location: login.html");
?>
</body>
</html>