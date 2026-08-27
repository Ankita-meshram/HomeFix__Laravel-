<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HomeFix - Services</title>

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

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="/services">
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

            </ul>

        </div>

    </div>

</nav>


<!-- Services -->

<div class="container py-5">

    <h1 class="text-center mb-5">
        Our Services
    </h1>


    <!-- Loading -->

    <div id="loading"
         class="text-center">

        <div class="spinner-border text-primary"
             role="status">

        </div>

        <p class="mt-2">
            Loading services...
        </p>

    </div>


    <!-- Error -->

    <div id="errorMessage"
         class="alert alert-danger d-none">

    </div>


    <!-- Services Container -->

    <div id="servicesContainer"
         class="row g-4">

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>


<script>

document.addEventListener("DOMContentLoaded", function () {

    const servicesContainer =
        document.getElementById("servicesContainer");

    const loading =
        document.getElementById("loading");

    const errorMessage =
        document.getElementById("errorMessage");


    // Load services from backend

    fetch("/api/services")

        .then(response => {

            if (!response.ok) {

                throw new Error(
                    "Failed to load services."
                );

            }

            return response.json();

        })

        .then(services => {

            loading.classList.add("d-none");


            if (services.length === 0) {

                servicesContainer.innerHTML = `

                    <div class="col-12 text-center">

                        <p class="text-muted">
                            No services available.
                        </p>

                    </div>

                `;

                return;

            }


            services.forEach(service => {

                // Select icon according to service name

                let icon = "🛠️";

                const serviceName =
                    service.name.toLowerCase();


                if (serviceName.includes("plumb")) {

                    icon = "🚰";

                }
                else if (serviceName.includes("electric")) {

                    icon = "🔌";

                }
                else if (serviceName.includes("carpent")) {

                    icon = "🪚";

                }
                else if (serviceName.includes("paint")) {

                    icon = "🎨";

                }


                const card = document.createElement("div");

                card.className =
                    "col-md-3";


                card.innerHTML = `

                    <div class="card shadow-sm h-100 text-center p-3">

                        <h2>${icon}</h2>

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
                           class="btn btn-primary mt-auto">

                            Book Service

                        </a>

                    </div>

                `;


                servicesContainer.appendChild(card);

            });

        })

        .catch(error => {

            console.error(
                "Service loading error:",
                error
            );

            loading.classList.add("d-none");

            errorMessage.textContent =
                "Unable to load services.";

            errorMessage.classList.remove("d-none");

        });

});

</script>

</body>

</html>