<?php
session_start();
include "../includes/db.php";
include "../includes/header.php";

/* Get turf id from URL */

$turf_id = $_GET['id'] ?? null;
if(!$turf_id){
    die("Invalid Turf Selection");
}

$user_id = $_SESSION['user_id'];

/* Booking Logic */

if(isset($_POST['book'])){

$date = $_POST['date'];
$time = $_POST['time_slot'];

/* Check if slot already booked */

$stmt = $pdo->prepare("SELECT * FROM bookings 
WHERE turf_id=? AND booking_date=? AND time_slot=? AND status='booked'");

$stmt->execute([$turf_id,$date,$time]);

if($stmt->rowCount() > 0){

echo "<div class='alert alert-danger'>This slot is already booked.</div>";

}else{

$stmt = $pdo->prepare("INSERT INTO bookings 
(user_id,turf_id,booking_date,time_slot,status) 
VALUES (?,?,?,?,?)");

$stmt->execute([$user_id,$turf_id,$date,$time,"booked"]);

echo "<div class='alert alert-success'>Turf booked successfully!</div>";

}

}
?>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow booking-card">

<div class="card-body">

<h3 class="mb-4 text-center">⚽ Book Turf</h3>

<form method="POST">

<div class="mb-3">
<label class="form-label">Select Date</label>
<input type="date" name="date" class="form-control" required>
</div>

<div class="mb-4">
<label class="form-label">Select Time Slot</label>

<select name="time_slot" class="form-control" required>

<option value="6AM-7AM">6AM - 7AM</option>
<option value="7AM-8AM">7AM - 8AM</option>
<option value="8AM-9AM">8AM - 9AM</option>
<option value="9AM-10AM">9AM - 10AM</option>
<option value="5PM-6PM">5PM - 6PM</option>
<option value="6PM-7PM">6PM - 7PM</option>
<option value="7PM-8PM">7PM - 8PM</option>

</select>

</div>

<button type="submit" name="book" class="btn btn-primary w-100">
Confirm Booking
</button>

</form>

</div>

</div>

</div>

</div>

</div>