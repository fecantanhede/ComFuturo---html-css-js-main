<?php
session_start();

// Conectar ao banco de dados (substitua as credenciais e informações do banco de dados conforme necessário)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comfuturo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica o token CSRF
    if (!empty($_POST['csrf_token']) && $_POST['csrf_token'] === 'coloque_uma_string_aleatoria_aqui') {
        // Recupera os dados do formulário
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        // Consulta ao banco de dados para verificar as credenciais
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Autenticação bem-sucedida, redireciona para a página de perfil
            header("Location: /listar.php");
            exit();
        } else {
            // Credenciais inválidas, exibe uma mensagem de erro
            echo "Credenciais inválidas. Por favor, verifique seu e-mail e senha.";
        }
    } else {
        // Token CSRF inválido, pode ser um ataque
        echo "Erro de segurança. Tente novamente.";
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
