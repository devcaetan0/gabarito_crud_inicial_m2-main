<?php

include("../infra/db/connect.php");
include("component/auth.php");

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
