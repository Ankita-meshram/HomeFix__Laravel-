<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HomeFix</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>


<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand fw-bold" href="/">
            🏠 HomeFix
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse"
             id="navbarNav">

           <ul class="navbar-nav ms-auto align-items-center">

    <li class="nav-item">
        <a class="nav-link active" href="/">
            Home
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/services">
            Services
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/technicians">
            Technicians
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/booking">
            Book Service
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/about">
            About
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/contact">
            Contact
        </a>
    </li>

    @auth

        <li class="nav-item">
            <a class="btn btn-light btn-sm ms-2"
               href="/my-bookings">
                My Bookings
            </a>
        </li>

        <li class="nav-item">
            <form action="/logout"
                  method="POST"
                  class="d-inline">

                @csrf

                <button type="submit"
                        class="btn btn-danger btn-sm ms-2">
                    Logout
                </button>

            </form>
        </li>

    @else

        <li class="nav-item">
            <a class="btn btn-light btn-sm ms-2"
               href="/login">
                Login
            </a>
        </li>

        <li class="nav-item">
            <a class="btn btn-warning btn-sm ms-2"
               href="/register">
                Register
            </a>
        </li>

    @endauth

 
</ul>

        </div>

    </div>

</nav>


<!-- Hero Section -->

<section class="bg-light py-5">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6">

                <h1 class="display-4 fw-bold">
                    Home Repair Services at Your Doorstep
                </h1>

                <p class="lead mt-3">

                    Book trusted electricians, plumbers,
                    carpenters, painters and more with just one click.

                </p>

                <a href="/booking"
                   class="btn btn-primary btn-lg mt-3">

                    Book Now

                </a>

                <a href="/about"
                   class="btn btn-outline-dark btn-lg mt-3 ms-2">

                    Learn More

                </a>

            </div>


            <div class="col-md-6 text-center">

                <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=700"
                     class="img-fluid rounded shadow"
                     alt="Home Repair">

            </div>

        </div>

    </div>

</section>


<!-- Service Section -->

<section class="py-5">

    <div class="container">

        <h2 class="text-center mb-5">
            Our Services
        </h2>


        <!-- Loading -->

        <div id="serviceLoading"
             class="text-center">

            <div class="spinner-border text-primary"
                 role="status">

            </div>

            <p class="mt-2">
                Loading services...
            </p>

        </div>


        <!-- Services -->

        <div id="servicesContainer"
             class="row g-4">

        </div>


        <!-- View All -->

        <div class="text-center mt-4">

            <a href="/services"
               class="btn btn-outline-primary">

                View All Services

            </a>

        </div>

    </div>

</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>


<script>

document.addEventListener("DOMContentLoaded", function () {

    const container =
        document.getElementById("servicesContainer");

    const loading =
        document.getElementById("serviceLoading");


    // Get services from backend

    fetch("/api/services")

        .then(response => {

            if (!response.ok) {

                throw new Error(
                    "Unable to load services."
                );

            }

            return response.json();

        })

        .then(services => {

            loading.classList.add("d-none");


            // Show only first 4 services on Home page

            const displayedServices =
                services.slice(0, 4);


            displayedServices.forEach(service => {

                let icon = "🛠️";

                const name =
                    service.name.toLowerCase();


                if (name.includes("plumb")) {
                    icon = "🚰";
                }
                else if (name.includes("electric")) {
                    icon = "🔌";
                }
                else if (name.includes("carpent")) {
                    icon = "🪚";
                }
                else if (name.includes("paint")) {
                    icon = "🎨";
                }


                const card =
                    document.createElement("div");

                card.className =
                    "col-md-3";


                card.innerHTML = `

                    <div class="card shadow h-100">

                        <div class="card-body text-center">

                            <h3>
                                ${icon}
                            </h3>

                            <h5>
                                ${service.name}
                            </h5>

                            <p>
                                ${service.description}
                            </p>

                            <h6 class="text-primary">
                                ₹${service.price}
                            </h6>

                            <a href="/booking"
                               class="btn btn-primary">

                                Book Now

                            </a>

                        </div>

                    </div>

                `;


                container.appendChild(card);

            });

        })

        .catch(error => {

            console.error(
                "Service error:",
                error
            );

            loading.classList.add("d-none");

            container.innerHTML = `

                <div class="col-12 text-center">

                    <p class="text-danger">
                        Unable to load services.
                    </p>

                </div>

            `;

        });

});

</script>


</body>

</html>