<?php
session_start();
include "../includes/db.php";
include "../includes/header.php";

$owner_id = $_SESSION['user_id'];

if(isset($_POST['add_turf'])){

$name = $_POST['name'];
$location = $_POST['location'];
$price = $_POST['price_per_hour'];

/* Upload Image */

$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp,"../uploads/".$image);

/* Insert Turf */

$stmt = $pdo->prepare("
INSERT INTO turfs (name,location,price_per_hour,image,owner_id)
VALUES (?,?,?,?,?)
");

$stmt->execute([$name,$location,$price,$image,$owner_id]);

echo "<div class='alert alert-success text-center'>Turf Added Successfully</div>";
}
?>

<div class="container mt-5">

<div class="card mx-auto p-4 shadow" style="max-width:450px">

<h3 class="text-center mb-4">Add Turf</h3>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Turf Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Location</label>
<input type="text" name="location" class="form-control" required>
</div>

<div class="mb-3">
<label>Price per Hour</label>
<input type="number" name="price_per_hour" class="form-control" required>
</div>

<div class="mb-3">
<label>Turf Image</label>
<input type="file" name="image" class="form-control" required>
</div>

<button type="submit" name="add_turf" class="btn btn-primary w-100">
Add Turf
</button>

</form>

</div>

</div>

?>