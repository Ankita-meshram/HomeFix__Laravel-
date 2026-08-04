<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Service - HomeFix</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <a class="navbar-brand fw-bold" href="/">🏠 HomeFix</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="/technicians">Technicians</a></li>
                <li class="nav-item"><a class="nav-link active" href="/booking">Book Service</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>

            </ul>

        </div>

    </div>
</nav>

<!-- Booking Form -->

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3 class="mb-0">
Book Home Service
</h3>

</div>

<div class="card-body">

<form>

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Full Name</label>
<input type="text" class="form-control" placeholder="Enter your name">
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Mobile Number</label>
<input type="text" class="form-control" placeholder="9876543210">
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Email</label>
<input type="email" class="form-control" placeholder="abc@gmail.com">
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Service</label>
<select class="form-select">
<option>Select Service</option>
<option>Electrician</option>
<option>Plumber</option>
<option>Carpenter</option>
<option>Painter</option>
</select>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Technician</label>
<select class="form-select">
<option>Select Technician</option>
<option>Rahul Sharma</option>
<option>Amit Verma</option>
<option>Suresh Patel</option>
</select>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Booking Date</label>
<input type="date" class="form-control">
</div>

<div class="col-12 mb-3">
<label class="form-label">Address</label>
<textarea class="form-control" rows="4"></textarea>
</div>

<div class="col-12 text-center">

<button class="btn btn-primary btn-lg">
Book Service
</button>

</div>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>