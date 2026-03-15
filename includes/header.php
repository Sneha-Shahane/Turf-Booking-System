<!DOCTYPE html>
<html>
<head>
<title>Turf Booking</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background: linear-gradient(rgba(10, 12, 15, 0.7),rgba(30, 18, 26, 0.7),rgba(27, 13, 13, 0.7));
min-height:100vh;
color:white;
}

.card{
background:white;
color:black;
border-radius:12px;
}

.navbar{
background: rgba(0,0,0,0.7);
backdrop-filter: blur(10px);
}
/* Navbar */
.navbar{
background:#222;
}


.navbar a{
color:white !important;
margin-right:15px;
font-weight:500;
}

.navbar a:hover{
color:#0d6efd !important;
}

/* Turf Cards */

.turf-card{
border:none;
border-radius:12px;
transition:0.3s;
}

.turf-card:hover{
transform:translateY(-6px);
box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

.turf-img{
height:200px;
object-fit:cover;
border-top-left-radius:12px;
border-top-right-radius:12px;
}

.booking-card{
border:none;
border-radius:12px;
transition:0.3s;
}

.booking-card:hover{
transform:translateY(-5px);
box-shadow:0 8px 18px rgba(0,0,0,0.15);
}
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">

<div class="container">

<a class="navbar-brand fw-bold" href="/turf-booking/index.php">
⚽ Turf Booking
</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<!-- <li class="nav-item">
<a class="nav-link" href="/turf-booking/index.php">Home</a>
</li> -->

<li class="nav-item">
<a class="nav-link" href="/turf-booking/user/browse_turfs.php">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/turf-booking/user/my_bookings.php">My Bookings</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/turf-booking/owner/add_turf.php">Add Turf</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/turf-booking/owner/manage_turfs.php">Manage Turfs</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/turf-booking/admin/dashboard.php">Admin</a>
</li>

<li class="nav-item">
<a class="nav-link text-danger" href="/turf-booking/logout.php">Logout</a>
</li>

</ul>

</div>

</div>

</nav>