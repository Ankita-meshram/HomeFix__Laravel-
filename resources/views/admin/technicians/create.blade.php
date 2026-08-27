<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Technician - HomeFix</title>

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

        <a href="/admin/technicians"
           class="btn btn-outline-light">

            Back to Technicians

        </a>

    </div>

</nav>


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-success text-white">

                    <h4 class="mb-0">
                        Add New Technician
                    </h4>

                </div>


                <div class="card-body">


                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form action="/admin/technicians"
                          method="POST">

                        @csrf


                        <!-- Name -->

                        <div class="mb-3">

                            <label class="form-label">
                                Technician Name
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Rahul Sharma"
                                   value="{{ old('name') }}"
                                   required>

                        </div>


                        <!-- Email -->

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="rahul@homefix.com"
                                   value="{{ old('email') }}"
                                   required>

                        </div>


                        <!-- Phone -->

                        <div class="mb-3">

                            <label class="form-label">
                                Phone
                            </label>

                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   placeholder="9876543210"
                                   value="{{ old('phone') }}">

                        </div>


                        <!-- Specialization -->

                        <div class="mb-3">

                            <label class="form-label">
                                Specialization
                            </label>

                            <input type="text"
                                   name="specialization"
                                   class="form-control"
                                   placeholder="Plumbing"
                                   value="{{ old('specialization') }}"
                                   required>

                        </div>


                        <!-- Experience -->

                        <div class="mb-3">

                            <label class="form-label">
                                Experience
                            </label>

                            <input type="text"
                                   name="experience"
                                   class="form-control"
                                   placeholder="5 years"
                                   value="{{ old('experience') }}">

                        </div>


                        <!-- Rating -->

                        <div class="mb-3">

                            <label class="form-label">
                                Rating
                            </label>

                            <input type="number"
                                   name="rating"
                                   class="form-control"
                                   min="0"
                                   max="5"
                                   step="0.1"
                                   placeholder="4.5"
                                   value="{{ old('rating') }}">

                        </div>


                        <!-- Available -->

                        <div class="form-check mb-4">

                            <input type="checkbox"
                                   name="available"
                                   value="1"
                                   class="form-check-input"
                                   id="available"
                                   checked>

                            <label class="form-check-label"
                                   for="available">

                                Technician is Available

                            </label>

                        </div>


                        <!-- Buttons -->

                        <button type="submit"
                                class="btn btn-success">

                            Add Technician

                        </button>

                        <a href="/admin/technicians"
                           class="btn btn-secondary">

                            Cancel

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


</body>

</html>