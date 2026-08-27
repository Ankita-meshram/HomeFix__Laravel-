<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/services">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/technicians">Technicians</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="/booking">Book Service</a>
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

                    <!-- Success Message -->
                    <div id="successMessage"
                         class="alert alert-success d-none">
                    </div>

                    <!-- Error Message -->
                    <div id="errorMessage"
                         class="alert alert-danger d-none">
                    </div>


                    <form id="bookingForm">

                        <div class="row">

                            <!-- Full Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Full Name
                                </label>

                                <input type="text"
                                       id="name"
                                       class="form-control"
                                       value="Ankita Meshram"
                                       required>
                            </div>


                            <!-- Mobile -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Mobile Number
                                </label>

                                <input type="text"
                                       id="phone"
                                       class="form-control"
                                       placeholder="9876543210">
                            </div>


                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email"
                                       id="email"
                                       class="form-control"
                                       value="ankita@homefix.com"
                                       required>
                            </div>


                            <!-- Service -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Service
                                </label>

                                <select id="service"
                                        class="form-select"
                                        required>

                                    <option value="">
                                        Select Service
                                    </option>

                                </select>

                            </div>


                            <!-- Technician -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Technician
                                </label>

                                <select id="technician"
                                        class="form-select"
                                        required>

                                    <option value="">
                                        Select Technician
                                    </option>

                                </select>

                            </div>


                            <!-- Booking Date -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Booking Date
                                </label>

                                <input type="date"
                                       id="bookingDate"
                                       class="form-control"
                                       required>

                            </div>


                            <!-- Booking Time -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Booking Time
                                </label>

                                <input type="time"
                                       id="bookingTime"
                                       class="form-control"
                                       required>

                            </div>


                            <!-- Address -->
                            <div class="col-12 mb-3">

                                <label class="form-label">
                                    Address
                                </label>

                                <textarea id="address"
                                          class="form-control"
                                          rows="4"
                                          placeholder="Enter your complete address"
                                          required></textarea>

                            </div>


                            <!-- Problem -->
                            <div class="col-12 mb-3">

                                <label class="form-label">
                                    Problem Description
                                </label>

                                <textarea id="problem"
                                          class="form-control"
                                          rows="3"
                                          placeholder="Describe your problem"></textarea>

                            </div>


                            <!-- Submit -->
                            <div class="col-12 text-center">

                                <button type="submit"
                                        id="submitButton"
                                        class="btn btn-primary btn-lg">

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


<script>

document.addEventListener("DOMContentLoaded", function () {

    const serviceSelect =
        document.getElementById("service");

    const technicianSelect =
        document.getElementById("technician");

    const bookingForm =
        document.getElementById("bookingForm");

    const successMessage =
        document.getElementById("successMessage");

    const errorMessage =
        document.getElementById("errorMessage");

    const submitButton =
        document.getElementById("submitButton");


    // Load Services
    fetch("/api/services")
        .then(response => response.json())
        .then(services => {

            services.forEach(service => {

                const option =
                    document.createElement("option");

                option.value = service.id;

                option.textContent =
                    service.name + " - ₹" + service.price;

                serviceSelect.appendChild(option);

            });

        })
        .catch(error => {

            console.error(
                "Error loading services:",
                error
            );

        });


    // Load Technicians
    fetch("/api/technicians")
        .then(response => response.json())
        .then(technicians => {

            technicians.forEach(technician => {

                const option =
                    document.createElement("option");

                option.value = technician.id;

                option.textContent =
                    technician.name +
                    " - " +
                    technician.specialization;

                technicianSelect.appendChild(option);

            });

        })
        .catch(error => {

            console.error(
                "Error loading technicians:",
                error
            );

        });


    // Submit Booking
    bookingForm.addEventListener("submit", function (event) {

        event.preventDefault();


        successMessage.classList.add("d-none");
        errorMessage.classList.add("d-none");


        submitButton.disabled = true;
        submitButton.textContent = "Booking...";


        const bookingData = {

            service_id:
                parseInt(serviceSelect.value),

            technician_id:
                parseInt(technicianSelect.value),

            booking_date:
                document.getElementById("bookingDate").value,

            booking_time:
                document.getElementById("bookingTime").value,

            address:
                document.getElementById("address").value,

            problem_description:
                document.getElementById("problem").value

        };


        const csrfToken =
    document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    
    fetch("/api/bookings", {
        method: "POST",
        
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": csrfToken
        },
        body: JSON.stringify(bookingData)
    })

        .then(async response => {

            const data =
                await response.json();

            if (!response.ok) {

                throw new Error(
                    data.message ||
                    "Booking failed."
                );

            }

            return data;

        })

        .then(data => {

            successMessage.textContent =
                "✅ Booking created successfully! Booking ID: " +
                data.booking.id;

            successMessage.classList.remove("d-none");

            bookingForm.reset();

        })

        .catch(error => {

            console.error(
                "Booking Error:",
                error
            );

            errorMessage.textContent =
                "❌ " + error.message;

            errorMessage.classList.remove("d-none");

        })

        .finally(() => {

            submitButton.disabled = false;

            submitButton.textContent =
                "Book Service";

        });

    });

});

</script>

</body>
</html>