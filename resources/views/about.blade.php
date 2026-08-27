<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About - HomeFix</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>

        body {
            background: #f8fafc;
            color: #1e293b;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        /* Navbar */

        .navbar {
            padding: 14px 0;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        .navbar-brand {
            font-size: 1.4rem;
            letter-spacing: 0.3px;
        }

        .nav-link {
            font-weight: 500;
            margin-left: 10px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #ffffff !important;
        }

        /* Hero */

        .hero {
            background: linear-gradient(135deg, #0d6efd, #2563eb);
            color: white;
            padding: 85px 20px;
            text-align: center;
        }

        .hero h1 {
            font-size: 3.2rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero p {
            max-width: 760px;
            margin: auto;
            font-size: 1.15rem;
            line-height: 1.8;
            opacity: 0.95;
        }

        /* Section */

        .section {
            padding: 75px 0;
        }

        .section-title {
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .section-subtitle {
            color: #64748b;
            max-width: 650px;
            margin: auto;
        }

        /* Mission cards */

        .info-card {
            background: white;
            border: none;
            border-radius: 18px;
            padding: 35px;
            height: 100%;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.07);
            transition: 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.12);
        }

        .icon-box {
            width: 58px;
            height: 58px;
            border-radius: 14px;
            background: #e8f1ff;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin-bottom: 20px;
        }

        .info-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .info-card p {
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 0;
        }

        /* Why Choose */

        .feature-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 30px 20px;
            height: 100%;
            text-align: center;
            transition: 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            border-color: #0d6efd;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        }

        .feature-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #eff6ff;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.7rem;
        }

        .feature-card h5 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .feature-card p {
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 0;
        }

        /* How it works */

        .step-card {
            text-align: center;
            padding: 25px;
        }

        .step-number {
            width: 48px;
            height: 48px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #0d6efd;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .step-card h5 {
            font-weight: 700;
        }

        .step-card p {
            color: #64748b;
        }

        /* CTA */

        .cta {
            background: white;
            border-radius: 22px;
            padding: 55px 30px;
            text-align: center;
            box-shadow: 0 8px 30px rgba(15, 23, 42, 0.07);
        }

        .cta h2 {
            font-weight: 700;
            margin-bottom: 15px;
        }

        .cta p {
            color: #64748b;
            max-width: 650px;
            margin: 0 auto 25px;
        }

        /* Footer */

        footer {
            background: #0f172a;
            color: #cbd5e1;
            padding: 35px 0;
            margin-top: 70px;
        }

        footer h5 {
            color: white;
            font-weight: 700;
        }

        footer a {
            color: #cbd5e1;
            text-decoration: none;
        }

        footer a:hover {
            color: white;
        }

        /* Responsive */

        @media (max-width: 768px) {

            .hero {
                padding: 60px 20px;
            }

            .hero h1 {
                font-size: 2.3rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .section {
                padding: 55px 0;
            }

        }

    </style>

</head>

<body>


<!-- ================= NAVBAR ================= -->

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
                    <a class="nav-link" href="/services">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/technicians">Technicians</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/booking">Book Service</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="/about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>

            </ul>

        </div>

    </div>

</nav>


<!-- ================= HERO ================= -->

<section class="hero">

    <div class="container">

        <h1>About HomeFix</h1>

        <p>
            HomeFix is a trusted online home-service platform that
            connects customers with reliable professionals for
            everyday repair and maintenance needs.
        </p>

    </div>

</section>


<!-- ================= MISSION & VISION ================= -->

<section class="section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Building Better Home Services
            </h2>

            <p class="section-subtitle">
                We make it simple to find skilled professionals,
                book services and get your home problems solved.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6">

                <div class="info-card">

                    <div class="icon-box">
                        <i class="bi bi-bullseye"></i>
                    </div>

                    <h3>Our Mission</h3>

                    <p>
                        To provide fast, reliable and affordable home
                        repair services while delivering a convenient
                        and satisfying experience to every customer.
                    </p>

                </div>

            </div>


            <div class="col-md-6">

                <div class="info-card">

                    <div class="icon-box">
                        <i class="bi bi-eye"></i>
                    </div>

                    <h3>Our Vision</h3>

                    <p>
                        To become one of India's most trusted home
                        service booking platforms by connecting
                        customers with skilled and dependable
                        professionals.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= WHY CHOOSE ================= -->

<section class="section bg-white">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Why Choose HomeFix?
            </h2>

            <p class="section-subtitle">
                Everything you need for a simple, reliable and
                hassle-free home service experience.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h5>Verified Experts</h5>

                    <p>
                        Connect with skilled professionals for
                        your home service requirements.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>

                    <h5>Fast Service</h5>

                    <p>
                        Book a service quickly and get your
                        home problems addressed without hassle.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-wallet2"></i>
                    </div>

                    <h5>Affordable Pricing</h5>

                    <p>
                        Transparent service pricing designed
                        to provide value for your money.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-star"></i>
                    </div>

                    <h5>Top Rated</h5>

                    <p>
                        Customer reviews and ratings help you
                        choose the right professional.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= HOW IT WORKS ================= -->

<section class="section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                How HomeFix Works
            </h2>

            <p class="section-subtitle">
                Get your home service booked in just a few simple steps.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-4">

                <div class="step-card">

                    <div class="step-number">
                        1
                    </div>

                    <h5>Choose a Service</h5>

                    <p>
                        Select the home service you need from
                        our available services.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="step-card">

                    <div class="step-number">
                        2
                    </div>

                    <h5>Book a Technician</h5>

                    <p>
                        Choose a suitable technician and provide
                        your booking details.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="step-card">

                    <div class="step-number">
                        3
                    </div>

                    <h5>Get the Service</h5>

                    <p>
                        Track your booking and get the required
                        service completed at your home.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= CTA ================= -->

<section class="container">

    <div class="cta">

        <h2>Need a Home Service?</h2>

        <p>
            From AC repair and plumbing to electrical work,
            carpentry and painting, HomeFix helps you find
            the right service for your needs.
        </p>

        <a href="/services"
           class="btn btn-primary btn-lg px-4">

            Explore Services
            <i class="bi bi-arrow-right ms-2"></i>

        </a>

    </div>

</section>


<!-- ================= FOOTER ================= -->

<footer>

    <div class="container">

        <div class="row g-4">

            <div class="col-md-6">

                <h5>🏠 HomeFix</h5>

                <p class="mb-0">
                    Your trusted platform for convenient
                    home repair and maintenance services.
                </p>

            </div>


            <div class="col-md-3">

                <h6 class="text-white">
                    Quick Links
                </h6>

                <div class="d-flex flex-column gap-2">

                    <a href="/">Home</a>
                    <a href="/services">Services</a>
                    <a href="/booking">Book Service</a>

                </div>

            </div>


            <div class="col-md-3">

                <h6 class="text-white">
                    Company
                </h6>

                <div class="d-flex flex-column gap-2">

                    <a href="/about">About</a>
                    <a href="/contact">Contact</a>

                </div>

            </div>

        </div>


        <hr class="border-secondary my-4">


        <div class="text-center">

            <small>
                © {{ date('Y') }} HomeFix. All rights reserved.
            </small>

        </div>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
