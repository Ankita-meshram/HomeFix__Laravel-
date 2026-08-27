<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Give Review - HomeFix</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand fw-bold" href="/">
            🏠 HomeFix
        </a>

        <a href="/booking" class="btn btn-outline-light">
            My Booking
        </a>

    </div>

</nav>


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card shadow">

                <div class="card-header bg-warning">

                    <h3 class="mb-0">
                        ⭐ Give Your Review
                    </h3>

                </div>


                <div class="card-body">

                    @if(session('success'))

                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                    @endif


                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


<form action="/review" method="POST">

                        @csrf
                        <div class="alert alert-info">
                            <strong>Service:</strong>
                            {{ $booking->service->name ?? 'Service' }}
                            <br>
                            <strong>Technician:</strong>
                            {{ $booking->technician->name ?? 'Not Assigned' }}
                        </div>

<input type="hidden"
       name="user_id"
       value="{{ auth()->id() }}">

<input type="hidden"
       name="booking_id"
       value="{{ $booking->id }}">

<input type="hidden"
       name="technician_id"
       value="{{ $booking->technician_id }}">

                        <!-- Rating -->

                        <div class="mb-3">

                            <label class="form-label">
                                Rating
                            </label>

                            <select name="rating"
                                    class="form-select"
                                    required>

                                <option value="">
                                    Select Rating
                                </option>

                                <option value="5">
                                    ⭐⭐⭐⭐⭐ 5 - Excellent
                                </option>

                                <option value="4">
                                    ⭐⭐⭐⭐ 4 - Very Good
                                </option>

                                <option value="3">
                                    ⭐⭐⭐ 3 - Good
                                </option>

                                <option value="2">
                                    ⭐⭐ 2 - Average
                                </option>

                                <option value="1">
                                    ⭐ 1 - Poor
                                </option>

                            </select>

                        </div>


                        <!-- Comment -->

                        <div class="mb-3">

                            <label class="form-label">
                                Comment
                            </label>

                            <textarea name="comment"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Write your experience..."></textarea>

                        </div>


                        <button type="submit"
                                class="btn btn-warning w-100">

                            Submit Review

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>