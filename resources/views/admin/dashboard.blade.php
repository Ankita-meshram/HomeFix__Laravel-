<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - HomeFix</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }

        .sidebar {
            min-height: 100vh;
            background: #212529;
        }

        .sidebar a {
            color: #ddd;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background: #343a40;
            color: white;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            padding: 20px;
            color: white;
        }

        .stat-card {
            border: none;
            border-radius: 15px;
            transition: 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-icon {
            font-size: 35px;
        }

        .topbar {
            background: white;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>

<div class="container-fluid">

    <div class="row">

        <!-- SIDEBAR -->

        <div class="col-md-2 sidebar p-3">

            <div class="brand">
                🏠 HomeFix
            </div>

            <hr class="text-secondary">

            <a href="/admin/dashboard"
             class="btn btn-outline-light me-2">
                📊 Dashboard
            </a>

            <a href="/admin/services"
            class="btn btn-outline-light me-2">
                🛠️ Services
            </a>

            <a href="/admin/technicians"
            class="btn btn-outline-light me-2">
                👨‍🔧 Technicians
            </a>

            <a href="/admin/bookings"
            class="btn btn-outline-light me-2">
                📅 Bookings
            </a>

            <a href="/admin/reviews"
            class="btn btn-outline-light me-2">
                ⭐ Reviews
            </a>

            <hr class="text-secondary">

            <a href="/"
            class="btn btn-outline-light me-2">
                🌐 View Website
            </a>

            <form action="/logout" method="POST" class="mt-2">
                @csrf

                <button type="submit"
                        class="btn btn-danger w-100">

                    🚪 Logout

                </button>
            </form>

        </div>


        <!-- MAIN CONTENT -->

        <div class="col-md-10 p-0">

            <!-- TOPBAR -->

            <nav class="navbar topbar px-4 py-3">

                <div>

                    <h4 class="mb-0">
                        Admin Dashboard
                    </h4>

                    <small class="text-muted">
                        HomeFix Management System
                    </small>

                </div>

                <div class="text-end">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <br>

                    <small class="text-muted">
                        Administrator
                    </small>

                </div>

            </nav>


            <!-- CONTENT -->

            <div class="p-4">

                <!-- Welcome -->

                <div class="mb-4">

                    <h2 class="fw-bold">
                        Welcome, {{ auth()->user()->name }} 👋
                    </h2>

                    <p class="text-muted">
                        Manage your HomeFix platform from here.
                    </p>

                </div>


                <!-- STATISTICS -->

                <div class="row g-4">


                    <!-- Services -->

                    <div class="col-md-3">

                        <div class="card stat-card shadow-sm h-100">

                            <div class="card-body">

                                <div class="stat-icon">
                                    🛠️
                                </div>

                                <h6 class="text-muted mt-2">
                                    Total Services
                                </h6>

                                <h2 class="fw-bold">
                                    {{ $servicesCount }}
                                </h2>

                                <a href="/admin/services"
                                   class="btn btn-sm btn-outline-primary">

                                    Manage

                                </a>

                            </div>

                        </div>

                    </div>


                    <!-- Technicians -->

                    <div class="col-md-3">

                        <div class="card stat-card shadow-sm h-100">

                            <div class="card-body">

                                <div class="stat-icon">
                                    👨‍🔧
                                </div>

                                <h6 class="text-muted mt-2">
                                    Technicians
                                </h6>

                                <h2 class="fw-bold">
                                    {{ $techniciansCount }}
                                </h2>

                                <a href="/admin/technicians"
                                   class="btn btn-sm btn-outline-success">

                                    Manage

                                </a>

                            </div>

                        </div>

                    </div>


                    <!-- Bookings -->

                    <div class="col-md-3">

                        <div class="card stat-card shadow-sm h-100">

                            <div class="card-body">

                                <div class="stat-icon">
                                    📅
                                </div>

                                <h6 class="text-muted mt-2">
                                    Total Bookings
                                </h6>

                                <h2 class="fw-bold">
                                    {{ $bookingsCount }}
                                </h2>

                                <a href="/admin/bookings"
                                   class="btn btn-sm btn-outline-warning">

                                    Manage

                                </a>

                            </div>

                        </div>

                    </div>


                    <!-- Reviews -->

                    <div class="col-md-3">

                        <div class="card stat-card shadow-sm h-100">

                            <div class="card-body">

                                <div class="stat-icon">
                                    ⭐
                                </div>

                                <h6 class="text-muted mt-2">
                                    Total Reviews
                                </h6>

                                <h2 class="fw-bold">
                                    {{ $reviewsCount }}
                                </h2>

                                <a href="/admin/reviews"
                                   class="btn btn-sm btn-outline-danger">

                                    Manage

                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- PENDING BOOKINGS -->

                <div class="alert alert-warning mt-5">

                    <strong>
                        📢 Pending Bookings:
                    </strong>

                    {{ $pendingBookings }}

                    booking(s) are waiting for confirmation.

                    <a href="/admin/bookings"
                       class="alert-link">

                        Manage Bookings

                    </a>

                </div>


                <!-- RECENT BOOKINGS -->

                <div class="card shadow-sm border-0 mt-4">

                    <div class="card-header bg-white">

                        <h5 class="mb-0">
                            📅 Recent Bookings
                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle">

                                <thead class="table-dark">

                                    <tr>

                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Service</th>
                                        <th>Technician</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @forelse($recentBookings as $booking)

                                        <tr>

                                            <td>
                                                #{{ $booking->id }}
                                            </td>

                                            <td>

                                                {{ $booking->user->name ?? '-' }}

                                                <br>

                                                <small class="text-muted">
                                                    {{ $booking->user->email ?? '-' }}
                                                </small>

                                            </td>

                                            <td>
                                                {{ $booking->service->name ?? '-' }}
                                            </td>

                                            <td>
                                                {{ $booking->technician->name ?? '-' }}
                                            </td>

                                            <td>

                                                {{ $booking->booking_date
                                                    ? $booking->booking_date->format('d-m-Y')
                                                    : '-' }}

                                            </td>

                                            <td>

                                                ₹{{ number_format($booking->total_amount, 2) }}

                                            </td>

                                            <td>

                                                @if($booking->status === 'pending')

                                                    <span class="badge bg-warning text-dark">
                                                        Pending
                                                    </span>

                                                @elseif($booking->status === 'confirmed')

                                                    <span class="badge bg-primary">
                                                        Confirmed
                                                    </span>

                                                @elseif($booking->status === 'completed')

                                                    <span class="badge bg-success">
                                                        Completed
                                                    </span>

                                                @elseif($booking->status === 'cancelled')

                                                    <span class="badge bg-danger">
                                                        Cancelled
                                                    </span>

                                                @else

                                                    <span class="badge bg-secondary">
                                                        {{ ucfirst($booking->status) }}
                                                    </span>

                                                @endif

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td colspan="7"
                                                class="text-center text-muted py-4">

                                                No bookings available.

                                            </td>

                                        </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>