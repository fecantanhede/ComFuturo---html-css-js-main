<?php
include('/include/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["name"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Usuário inserido com sucesso!";
    } else {
        echo "Erro ao inserir usuário: " . $conn->error;
    }
}
?>
