<?php
session_start();
include "../includes/db.php";
include "../includes/header.php"; 

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT bookings.*, turfs.name 
                       FROM bookings 
                       JOIN turfs ON bookings.turf_id = turfs.id
                       WHERE bookings.user_id = ?");
$stmt->execute([$user_id]);

$bookings = $stmt->fetchAll();
?>
<div class="container mt-4">

<h2 class="mb-4">My Bookings</h2>

<div class="row g-4">

<?php foreach($bookings as $row){ ?>

<div class="col-md-4">

<div class="card shadow-sm booking-card h-100">

<div class="card-body">

<h5 class="card-title"><?php echo $row['name']; ?></h5>

<p class="mb-1">
📅 <strong>Date:</strong> <?php echo $row['booking_date']; ?>
</p>

<p class="mb-1">
⏰ <strong>Time:</strong> <?php echo $row['time_slot']; ?>
</p>

<p class="mb-3">
Status:
<?php if($row['status']=="booked"){ ?>

<span class="badge bg-success">Booked</span>

<?php } else { ?>

<span class="badge bg-danger">Cancelled</span>

<?php } ?>
</p>

<a href="cancel_booking.php?id=<?php echo $row['id']; ?>" 
class="btn btn-outline-danger btn-sm">
Cancel Booking
</a>

</div>

</div>

</div>

<?php } ?>

</div>

</div>