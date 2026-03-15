<?php
session_start();
include "../includes/db.php";
include "../includes/header.php";

$stmt = $pdo->query("SELECT * FROM turfs");
$turfs = $stmt->fetchAll();
?>

<div class="container mt-4">

<h2 class="mb-4">Available Turfs</h2>

<div class="row g-4">

<?php foreach($turfs as $row){ ?>

<div class="col-md-4">

<div class="card shadow-sm h-100 turf-card">

<img src="../uploads/<?php echo $row['image']; ?>" class="card-img-top turf-img">

<div class="card-body">

<h5 class="card-title"><?php echo $row['name']; ?></h5>

<p class="card-text mb-1">
📍 Location: <?php echo $row['location']; ?>
</p>

<p class="card-text">
💰 Price: <?php echo $row['price_per_hour']; ?>
</p>

<a href="book_turf.php?id=<?php echo $row['id']; ?>" class="btn btn-primary w-100">
Book Turf
</a>

</div>

</div>

</div>

<?php } ?>

</div>
</div>