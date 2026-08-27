<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>My Bookings - HomeFix</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body {
            background: #f5f7fb;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .page-title {
            font-weight: 700;
        }

        .booking-card {
            border: none;
            border-radius: 15px;
            transition: 0.2s;
        }

        .booking-card:hover {
            transform: translateY(-3px);
        }

        .service-title {
            font-weight: 700;
        }

        .booking-info {
            margin-bottom: 10px;
        }

        .booking-label {
            font-weight: 600;
            color: #555;
        }

        .amount {
            font-size: 20px;
            font-weight: 700;
        }

        .empty-box {
            background: white;
            border-radius: 15px;
            padding: 50px 20px;
            text-align: center;
        }

    </style>

</head>


<body>


<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand fw-bold"
           href="/">

            🏠 HomeFix

        </a>


        <div>

            <a href="/"
               class="btn btn-outline-light me-2">

                Home

            </a>


            <form action="/logout"
                  method="POST"
                  class="d-inline">

                @csrf

                <button type="submit"
                        class="btn btn-light">

                    🚪 Logout

                </button>

            </form>

        </div>

    </div>

</nav>



<!-- MAIN CONTENT -->

<div class="container py-5">


    <!-- HEADER -->

    <div class="mb-4">

        <h1 class="page-title">
            📅 My Bookings
        </h1>

        <p class="text-muted">
            View and manage your HomeFix service bookings.
        </p>

    </div>


    <!-- SUCCESS MESSAGE -->

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    <!-- ERROR MESSAGE -->

    @if($errors->any())

        <div class="alert alert-danger">

            @foreach($errors->all() as $error)

                <div>
                    {{ $error }}
                </div>

            @endforeach

        </div>

    @endif



    @if($bookings->count() > 0)


        <!-- BOOKING CARDS -->

        <div class="row g-4">


            @foreach($bookings as $booking)


                <div class="col-md-6 col-lg-4">


                    <div class="card booking-card shadow-sm h-100">


                        <div class="card-body p-4">


                            <!-- SERVICE -->

                            <h4 class="service-title mb-3">

                                🛠️
                                {{ $booking->service->name ?? 'Service' }}

                            </h4>


                            <hr>


                            <!-- TECHNICIAN -->

                            <div class="booking-info">

                                <span class="booking-label">
                                    👨‍🔧 Technician:
                                </span>

                                <br>

                                {{ $booking->technician->name ?? 'Not Assigned' }}

                            </div>


                            <!-- DATE -->

                            <div class="booking-info">

                                <span class="booking-label">
                                    📅 Date:
                                </span>

                                <br>

                                {{ $booking->booking_date
                                    ? $booking->booking_date->format('d-m-Y')
                                    : '-' }}

                            </div>


                            <!-- TIME -->

                            <div class="booking-info">

                                <span class="booking-label">
                                    ⏰ Time:
                                </span>

                                <br>

                                {{ $booking->booking_time ?? '-' }}

                            </div>


                            <!-- ADDRESS -->

                            <div class="booking-info">

                                <span class="booking-label">
                                    📍 Address:
                                </span>

                                <br>

                                {{ $booking->address ?? '-' }}

                            </div>


                            <!-- AMOUNT -->

                            <div class="booking-info">

                                <span class="booking-label">
                                    💰 Amount:
                                </span>

                                <br>

                                <span class="amount">
                                    ₹{{ number_format($booking->total_amount, 2) }}
                                </span>

                            </div>


                            <hr>


                            <!-- STATUS -->

                            <div class="mb-3">

                                <span class="booking-label">
                                    Status:
                                </span>


                                <div class="mt-2">


                                    @if($booking->status === 'pending')

                                        <span class="badge bg-warning text-dark">
                                            ⏳ Pending
                                        </span>


                                    @elseif($booking->status === 'confirmed')

                                        <span class="badge bg-primary">
                                            ✅ Confirmed
                                        </span>


                                    @elseif($booking->status === 'completed')

                                        <span class="badge bg-success">
                                            🎉 Completed
                                        </span>


                                    @elseif($booking->status === 'cancelled')

                                        <span class="badge bg-danger">
                                            ❌ Cancelled
                                        </span>

                                    @endif

                                </div>

                            </div>



                            <!-- CANCEL BOOKING -->

                            @if($booking->status === 'pending' || $booking->status === 'confirmed')

                                <form action="/bookings/{{ $booking->id }}/cancel"
                                      method="POST"
                                      class="mb-3">

                                    @csrf

                                    @method('PUT')

                                    <button type="submit"
                                            class="btn btn-danger w-100"
                                            onclick="return confirm('Are you sure you want to cancel this booking?')">

                                        ❌ Cancel Booking

                                    </button>

                                </form>

                            @endif



                            <!-- REVIEW BUTTON -->

                            @if($booking->status === 'completed')

                                <a href="/review?booking_id={{ $booking->id }}"
                                   class="btn btn-success w-100">

                                    ⭐ Give Review

                                </a>

                            @endif


                        </div>

                    </div>


                </div>


            @endforeach


        </div>


    @else


        <!-- NO BOOKINGS -->

        <div class="empty-box shadow-sm">


            <div style="font-size: 55px;">
                📅
            </div>


            <h3 class="mt-3">
                No Bookings Yet
            </h3>


            <p class="text-muted">

                You haven't booked any HomeFix service yet.

            </p>


            <a href="/booking"
               class="btn btn-primary">

                🛠️ Book a Service

            </a>


        </div>


    @endif


</div>


</body>

</html>