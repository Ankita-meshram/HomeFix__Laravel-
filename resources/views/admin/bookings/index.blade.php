<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Manage Bookings - HomeFix</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">


<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand fw-bold"
           href="/admin/dashboard">

            🏠 HomeFix Admin

        </a>

        <a href="/admin/dashboard"
           class="btn btn-outline-light">

            Dashboard

        </a>

    </div>

</nav>


<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>
            Manage Bookings
        </h1>

        <a href="/admin/dashboard"
           class="btn btn-secondary">

            Back to Dashboard

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>

                            <th>User</th>

                            <th>Service</th>

                            <th>Technician</th>

                            <th>Date</th>

                            <th>Time</th>

                            <th>Address</th>

                            <th>Amount</th>

                            <th>Status</th>

                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($bookings as $booking)

                            <tr>

                                <td>
                                    {{ $booking->id }}
                                </td>


                                <td>

                                    @if($booking->user)

                                        {{ $booking->user->name }}

                                        <br>

                                        <small class="text-muted">
                                            {{ $booking->user->email }}
                                        </small>

                                    @else

                                        -

                                    @endif

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

                                    {{ $booking->booking_time ?? '-' }}

                                </td>


                                <td>

                                    {{ $booking->address }}

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

                                    @endif

                                </td>


                                <td>

                                    <form
                                        action="/admin/bookings/{{ $booking->id }}/status"
                                        method="POST">

                                        @csrf

                                        @method('PUT')


                                        <select name="status"
                                                class="form-select form-select-sm mb-2">

                                            <option value="pending"
                                                {{ $booking->status === 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>

                                            <option value="confirmed"
                                                {{ $booking->status === 'confirmed' ? 'selected' : '' }}>
                                                Confirmed
                                            </option>

                                            <option value="completed"
                                                {{ $booking->status === 'completed' ? 'selected' : '' }}>
                                                Completed
                                            </option>

                                            <option value="cancelled"
                                                {{ $booking->status === 'cancelled' ? 'selected' : '' }}>
                                                Cancelled
                                            </option>

                                        </select>


                                        <button type="submit"
                                                class="btn btn-sm btn-primary w-100">

                                            Update Status

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="10"
                                    class="text-center">

                                    No bookings found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


</body>

</html>