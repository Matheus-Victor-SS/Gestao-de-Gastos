<?php
session_start();

// conectar no banco
$conn = new mysqli("localhost", "root", "", "controle_financeiro");

// pegar dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// buscar usuário
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $user = $result->fetch_assoc();

    // verificar senha
    if (password_verify($senha, $user['senha'])) {

        // salvar login na sessão
        $_SESSION['id'] = $user['id'];

        // se marcou "lembrar"
        if (isset($_POST['lembrar'])) {
            setcookie("id", $user['id'], time() + (86400 * 30));
        }

        header("Location: dashboard.php");
        exit;

    } else {
        echo "Senha errada";
    }

} else {
    echo "Usuário não existe";
}

$conn->close();
?>