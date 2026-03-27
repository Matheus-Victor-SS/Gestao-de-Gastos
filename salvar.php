<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acesso inválido!");
}

$conn = new mysqli("localhost", "root", "", "controle_financeiro");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}


var_dump($_POST);

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$salario = $_POST['salario'];

$sql = "INSERT INTO usuarios (nome, email, senha, salario)
        VALUES ('$nome', '$email', '$senha', '$salario')";

if ($conn->query($sql) === TRUE) {

    // inicia sessão
    session_start();

    // pega o ID do usuário recém criado
    $_SESSION['id'] = $conn->insert_id;

    // redireciona
    header("Location: dashboard.php");
    exit;

} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>