<?php
session_start();
include "../includes/db.php";
include "../includes/header.php";

/* TOTAL USERS */
$stmt = $pdo->query("SELECT COUNT(*) FROM users");
$total_users = $stmt->fetchColumn();

/* TOTAL TURFS */
$stmt = $pdo->query("SELECT COUNT(*) FROM turfs");
$total_turfs = $stmt->fetchColumn();

/* TOTAL BOOKINGS */
$stmt = $pdo->query("SELECT COUNT(*) FROM bookings");
$total_bookings = $stmt->fetchColumn();

/* USERS LIST */
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll();

/* TURFS LIST */
$stmt = $pdo->query("SELECT * FROM turfs");
$turfs = $stmt->fetchAll();

/* BOOKINGS LIST */
$stmt = $pdo->query("SELECT * FROM bookings");
$bookings = $stmt->fetchAll();
?>
<div class="container mt-4">

<h2 class="mb-4">Admin Dashboard</h2>

<div class="row g-4">

<!-- Users Card -->
<div class="col-md-4">
<div class="card shadow dashboard-card">
<div class="card-body text-center">

<h5>Total Users</h5>
<h2><?php echo $total_users; ?></h2>

</div>
</div>
</div>

<!-- Turfs Card -->
<div class="col-md-4">
<div class="card shadow dashboard-card">
<div class="card-body text-center">

<h5>Total Turfs</h5>
<h2><?php echo $total_turfs; ?></h2>

</div>
</div>
</div>

<!-- Bookings Card -->
<div class="col-md-4">
<div class="card shadow dashboard-card">
<div class="card-body text-center">

<h5>Total Bookings</h5>
<h2><?php echo $total_bookings; ?></h2>

</div>
</div>
</div>

</div>


<!-- Users Table -->

<h3 class="mt-5">Users</h3>

<div class="card shadow p-3">
<table class="table table-striped">

<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Role</th>
</tr>
</thead>

<tbody>

<?php foreach($users as $u){ ?>

<tr>
<td><?php echo $u['name']; ?></td>
<td><?php echo $u['email']; ?></td>
<td><?php echo $u['role']; ?></td>
</tr>

<?php } ?>

</tbody>

</table>
</div>



<!-- Turfs Table -->

<h3 class="mt-5">Turfs</h3>

<div class="card shadow p-3">

<table class="table table-striped">

<thead>
<tr>
<th>Name</th>
<th>Location</th>
<th>Price</th>
</tr>
</thead>

<tbody>

<?php foreach($turfs as $t){ ?>

<tr>
<td><?php echo $t['name']; ?></td>
<td><?php echo $t['location']; ?></td>
<td>₹<?php echo $t['price_per_hour']; ?></td>
</tr>

<?php } ?>

</tbody>

</table>

</div>



<!-- Bookings Table -->

<h3 class="mt-5">Bookings</h3>

<div class="card shadow p-3">

<table class="table table-striped">

<thead>
<tr>
<th>ID</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
</tr>
</thead>

<tbody>

<?php foreach($bookings as $b){ ?>

<tr>
<td><?php echo $b['id']; ?></td>
<td><?php echo $b['booking_date']; ?></td>
<td><?php echo $b['time_slot']; ?></td>
<td>

<?php if($b['status']=="booked"){ ?>

<span class="badge bg-success">Booked</span>

<?php } else { ?>

<span class="badge bg-danger">Cancelled</span>

<?php } ?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>