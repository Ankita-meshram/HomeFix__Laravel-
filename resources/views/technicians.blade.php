<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HomeFix - Technicians</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        .card:hover {
            transform: translateY(-8px);
            transition: .3s;
        }

        .rating {
            color: orange;
            font-size: 20px;
        }

        .technician-image {
            height: 250px;
            object-fit: cover;
        }

    </style>

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


        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/services">
                        Services
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="/technicians">
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

            </ul>

        </div>

    </div>

</nav>


<!-- Technicians -->

<div class="container py-5">

    <h1 class="text-center mb-5">
        Our Expert Technicians
    </h1>


    <!-- Loading -->

    <div id="loading"
         class="text-center">

        <div class="spinner-border text-primary"
             role="status">

        </div>

        <p class="mt-2">
            Loading technicians...
        </p>

    </div>


    <!-- Error -->

    <div id="errorMessage"
         class="alert alert-danger d-none">

    </div>


    <!-- Technicians Container -->

    <div id="techniciansContainer"
         class="row g-4">

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>


<script>

document.addEventListener("DOMContentLoaded", function () {

    const container =
        document.getElementById("techniciansContainer");

    const loading =
        document.getElementById("loading");

    const errorMessage =
        document.getElementById("errorMessage");


    // Load technicians from API

    fetch("/api/technicians")

        .then(response => {

            if (!response.ok) {

                throw new Error(
                    "Failed to load technicians."
                );

            }

            return response.json();

        })

        .then(technicians => {

            loading.classList.add("d-none");


            if (technicians.length === 0) {

                container.innerHTML = `

                    <div class="col-12 text-center">

                        <p class="text-muted">
                            No technicians available.
                        </p>

                    </div>

                `;

                return;

            }


            technicians.forEach(technician => {

                const rating =
                    Math.round(
                        parseFloat(technician.rating || 0)
                    );


                let stars = "";

                for (let i = 1; i <= 5; i++) {

                    if (i <= rating) {

                        stars += "★";

                    } else {

                        stars += "☆";

                    }

                }


                const card =
                    document.createElement("div");

                card.className =
                    "col-md-4";


                card.innerHTML = `

                    <div class="card shadow h-100">

                        <img src="https://via.placeholder.com/300x250"
                             class="card-img-top technician-image"
                             alt="${technician.name}">


                        <div class="card-body text-center">

                            <h4>
                                ${technician.name}
                            </h4>


                            <p>
                                ${technician.specialization}
                            </p>


                            <div class="rating">

                                ${stars}

                            </div>


                            <p class="mt-2">

                                Experience :
                                ${technician.experience || "Not specified"}

                            </p>


                            <p>

                                📞 ${technician.phone || "Not available"}

                            </p>


                            <p>

                                ${
                                    technician.available
                                    ? "🟢 Available"
                                    : "🔴 Not Available"
                                }

                            </p>


                            ${
                                technician.available
                                ?

                                `<a href="/booking"
                                   class="btn btn-primary">

                                    Book Now

                                </a>`

                                :

                                `<button class="btn btn-secondary"
                                         disabled>

                                    Not Available

                                </button>`
                            }

                        </div>

                    </div>

                `;


                container.appendChild(card);

            });

        })

        .catch(error => {

            console.error(
                "Technician loading error:",
                error
            );

            loading.classList.add("d-none");

            errorMessage.textContent =
                "Unable to load technicians.";

            errorMessage.classList.remove("d-none");

        });

});

</script>

</body>

</html>