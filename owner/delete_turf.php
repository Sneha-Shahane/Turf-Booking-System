<?php
include "../includes/db.php";
include "../includes/header.php"; 

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM turfs WHERE id=?");
$stmt->execute([$id]);

header("Location: manage_turfs.php");
?>