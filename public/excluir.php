<?php

include("../infra/db/connect.php");
if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit();
}

$id = $_GET["id"];

$sql = "DELETE FROM users WHERE id = $id ";

if ($conn->query($sql) === TRUE) {
    header("Location: home.php");
    exit();
} else {
    echo "<script> alert('Deu errado!');</script>";
    header("Location: home.php");
    exit();
}
