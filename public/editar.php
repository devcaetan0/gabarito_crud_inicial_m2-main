<?php

    include("../infra/db/connect.php");
    include("component/auth.php");

    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id = $id";
    $resultado = $conn -> query($sql);

    $usuario = $resultado -> fetch_assoc();

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $novoUsuario = $_POST["usuario"];
        $novaSenha = $_POST["senha"];

        $sqlUpdate = "UPDATE users SET 
                        username = '$novoUsuario', 
                        password = '$novaSenha' 
                        WHERE id ='$id'";
        if($conn -> query($sqlUpdate) === TRUE){
            header("Location: home.php");
            exit();
        }else{
            echo "<script> alert('Deu errado!');</script>";
            header("Location: home.php");
            exit();
        }
    }


?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <h2> Editar Usuário </h2>

    <form method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" value=" <?php echo $usuario['username'] ?> ">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" value=" <?php echo $usuario['password'] ?> ">
        <br>
        <br>
        <button type="submit">Salvar</button>
    </form>

</body>

</html>