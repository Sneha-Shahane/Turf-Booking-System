<?php
session_start();
include "../includes/db.php";
include "../includes/header.php"; 
$owner_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM turfs WHERE owner_id=?");
$stmt->execute([$owner_id]);

$turfs = $stmt->fetchAll();
?>

<div class="container mt-4">

<h2 class="mb-4">My Turfs</h2>

<div class="row g-4">

<?php foreach($turfs as $row){ ?>

<div class="col-md-4">

<div class="card shadow-sm turf-card h-100">

<img src="../uploads/<?php echo $row['image']; ?>" class="card-img-top turf-img">

<div class="card-body">

<h5 class="card-title"><?php echo $row['name']; ?></h5>

<p class="mb-1">
📍 <?php echo $row['location']; ?>
</p>

<p class="mb-3">
💰 ₹<?php echo $row['price_per_hour']; ?>
</p>

<div class="d-flex gap-2">

<a href="edit_turf.php?id=<?php echo $row['id']; ?>" 
class="btn btn-warning btn-sm w-50">
Edit
</a>

<a href="delete_turf.php?id=<?php echo $row['id']; ?>" 
class="btn btn-danger btn-sm w-50">
Delete
</a>

</div>

</div>

</div>

</div>

<?php } ?>

</div>

</div>