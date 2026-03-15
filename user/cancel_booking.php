<?php
session_start();
include "../includes/db.php";
include "../includes/header.php"; 

$id = $_GET['id'];

$stmt = $pdo->prepare("UPDATE bookings SET status='cancelled' WHERE id=?");
$stmt->execute([$id]);

header("Location: my_bookings.php");
?>