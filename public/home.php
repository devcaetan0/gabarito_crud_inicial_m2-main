<?php
include("../infra/db/connect.php");
include("component/auth.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $sql = "INSERT INTO users (username, password) VALUES ('$usuario','$senha')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuário Cadastrado com sucesso!')</script>";
    } else {
        echo "<script>alert('Erro Usuário Não Cadastrado!')</script>";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body>
    <?php
    include("../public/component/navbar.php");
    ?>
    <h2>Bem-vindo!</h2>
    <p> Usuário logado:
        <?php echo $_SESSION["usuario"]; ?>
    </p>

    <h4>Cadastrar Novo Usuário</h4>
    <form method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha">
        <br>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
    <?php

    include("../public/component/table.php");
    ?>

    <br>
    <a href="logout.php">Sair</a>

</body>

</html>