<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Manage Technicians - HomeFix</title>

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
            Manage Technicians
        </h1>

        <a href="/admin/technicians/create"
           class="btn btn-success">

            + Add Technician

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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Specialization</th>
                            <th>Experience</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($technicians as $technician)

                            <tr>

                                <td>
                                    {{ $technician->id }}
                                </td>

                                <td>
                                    {{ $technician->name }}
                                </td>

                                <td>
                                    {{ $technician->email }}
                                </td>

                                <td>
                                    {{ $technician->phone ?? '-' }}
                                </td>

                                <td>
                                    {{ $technician->specialization }}
                                </td>

                                <td>
                                    {{ $technician->experience ?? '-' }}
                                </td>

                                <td>
                                    ⭐ {{ $technician->rating ?? '0' }}
                                </td>

                                <td>

                                    @if($technician->available)

                                        <span class="badge bg-success">
                                            Available
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Unavailable
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a href="/admin/technicians/{{ $technician->id }}/edit"
                                       class="btn btn-sm btn-warning">

                                        Edit

                                    </a>


                                    <form action="/admin/technicians/{{ $technician->id }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this technician?')">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9"
                                    class="text-center">

                                    No technicians found.

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