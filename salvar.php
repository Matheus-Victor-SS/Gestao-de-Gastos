<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "controle_financeiro";

$conn = new mysqli("localhost", "root", "", "controle_financeiro");
//testando se ta conectando
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
//pegando os valores
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$salario = $_POST['salario'];

// inserir no banco
$sql = "INSERT INTO usuarios (nome, email, senha, salario)
        VALUES ('$nome', '$email', '$senha', '$salario')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro com salário salvo!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>