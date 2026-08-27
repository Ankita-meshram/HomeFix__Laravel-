<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Manage Reviews - HomeFix</title>

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
            Manage Reviews
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

                <table class="table table-bordered table-hover">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>

                            <th>User</th>

                            <th>Technician</th>

                            <th>Rating</th>

                            <th>Comment</th>

                            <th>Date</th>

                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($reviews as $review)

                            <tr>

                                <td>
                                    {{ $review->id }}
                                </td>


                                <td>

                                    {{ $review->user->name ?? '-' }}

                                </td>


                                <td>

                                    {{ $review->technician->name ?? '-' }}

                                </td>


                                <td>

                                    ⭐ {{ $review->rating }}

                                </td>


                                <td>

                                    {{ $review->comment ?? '-' }}

                                </td>


                                <td>

                                    {{ $review->created_at->format('d-m-Y') }}

                                </td>


                                <td>

                                    <form
                                        action="/admin/reviews/{{ $review->id }}"
                                        method="POST">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this review?')">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center">

                                    No reviews found.

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