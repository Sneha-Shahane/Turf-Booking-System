<?php
session_start();
include "includes/db.php";
include "includes/header.php"; 

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
$stmt->execute([$email]);

$user = $stmt->fetch();

if($user && password_verify($password, $user['password'])){

$_SESSION['user_id'] = $user['id'];
$_SESSION['role'] = $user['role'];

if($user['role'] == "user"){
header("Location: user/browse_turfs.php");
}

elseif($user['role'] == "owner"){
header("Location: owner/manage_turfs.php");
}

elseif($user['role'] == "admin"){
header("Location: admin/dashboard.php");
}

exit();

} else {

echo "Invalid Email or Password";

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

<label>Email</label>
<input type="email" name="email" class="form-control" required>

<br>

<label>Password</label>
<input type="password" name="password" class="form-control" required>

<br>

<button class="btn btn-primary w-100" type="submit" name="login">
Login
</button>

</form>

<br>

<p class="text-center">
Don't have an account? <a href="register.php">Register</a>
</p>

</div>

</div>

</body>
</html>