<?php
session_start();
include "includes/db.php";
include "includes/header.php";

if(isset($_POST['register'])){

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

/* Check if email already exists */

$check = $pdo->prepare("SELECT * FROM users WHERE email=?");
$check->execute([$email]);

if($check->rowCount() > 0){

echo "<script>alert('Email already registered. Please login.')</script>";

}else{

$stmt = $pdo->prepare("INSERT INTO users (name,email,phone,password,role) VALUES (?,?,?,?,?)");

$stmt->execute([$name,$email,$phone,$password,$role]);

echo "<script>alert('Registration Successful!')</script>";

echo "<script>window.location='index.php'</script>"; // home page redirect

}

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card mx-auto p-4 shadow" style="max-width:400px">

<h3 class="text-center mb-4">Login</h3>

<form method="POST">
<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
<label>Role</label>
<select name="role" class="form-control">
<option value="user">User</option>
<option value="owner">Turf Owner</option>
</select>
</div>

<button class="btn btn-primary w-100" type="submit" name="register">
Register
</button>

<p class="text-center mt-3">
Already have an account? <a href="login.php">Login</a>
</p>
</body>
</html>