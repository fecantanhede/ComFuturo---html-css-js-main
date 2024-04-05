<?php
include('/include/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Usuário atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar usuário: " . $conn->error;
    }
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alteração de Usuário</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h2>Alteração de Usuário</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $row["nome"]; ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row["email"]; ?>" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" value="<?php echo $row["senha"]; ?>" required>

        <input type="submit" value="Alterar">
    </form>
</body>
</html>
