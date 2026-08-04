<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeFix - Technicians</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card:hover{
            transform: translateY(-8px);
            transition: .3s;
        }

        .rating{
            color:orange;
            font-size:20px;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container">

<a class="navbar-brand fw-bold" href="/">🏠 HomeFix</a>

<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarNav">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="/">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/services">Services</a>
</li>

<li class="nav-item">
<a class="nav-link active" href="/technicians">Technicians</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/booking">Book Service</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/about">About</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/contact">Contact</a>
</li>

</ul>

</div>

</div>
</nav>

<div class="container py-5">

<h1 class="text-center mb-5">
Our Expert Technicians
</h1>

<div class="row g-4">

<div class="col-md-4">

<div class="card shadow">

<img src="https://via.placeholder.com/300x250"
class="card-img-top">

<div class="card-body text-center">

<h4>Rahul Sharma</h4>

<p>Electrician</p>

<div class="rating">
★★★★★
</div>

<p class="mt-2">
Experience : 6 Years
</p>

<a href="/booking"
class="btn btn-primary">
Book Now
</a>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<img src="https://via.placeholder.com/300x250"
class="card-img-top">

<div class="card-body text-center">

<h4>Amit Verma</h4>

<p>Plumber</p>

<div class="rating">
★★★★☆
</div>

<p class="mt-2">
Experience : 8 Years
</p>

<a href="/booking"
class="btn btn-primary">
Book Now
</a>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<img src="https://via.placeholder.com/300x250"
class="card-img-top">

<div class="card-body text-center">

<h4>Suresh Patel</h4>

<p>Carpenter</p>

<div class="rating">
★★★★★
</div>

<p class="mt-2">
Experience : 10 Years
</p>

<a href="/booking"
class="btn btn-primary">
Book Now
</a>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>