<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Service - HomeFix</title>

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

        <a href="/admin/services"
           class="btn btn-outline-light">

            Back to Services

        </a>

    </div>

</nav>


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        Add New Service
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


                    <form action="/admin/services"
                          method="POST">

                        @csrf


                        <!-- Name -->

                        <div class="mb-3">

                            <label class="form-label">
                                Service Name
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Example: Electrician"
                                   value="{{ old('name') }}"
                                   required>

                        </div>


                        <!-- Description -->

                        <div class="mb-3">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Enter service description"
                                      required>{{ old('description') }}</textarea>

                        </div>


                        <!-- Price -->

                        <div class="mb-3">

                            <label class="form-label">
                                Price (₹)
                            </label>

                            <input type="number"
                                   name="price"
                                   class="form-control"
                                   placeholder="499"
                                   min="0"
                                   value="{{ old('price') }}"
                                   required>

                        </div>


                        <!-- Image -->

                        <div class="mb-3">

                            <label class="form-label">
                                Image
                            </label>

                            <input type="text"
                                   name="image"
                                   class="form-control"
                                   placeholder="plumbing.jpg"
                                   value="{{ old('image') }}">

                            <small class="text-muted">
                                Enter image file name.
                            </small>

                        </div>


                        <!-- Status -->

                        <div class="form-check mb-4">

                            <input type="checkbox"
                                   name="status"
                                   value="1"
                                   class="form-check-input"
                                   id="status"
                                   checked>

                            <label class="form-check-label"
                                   for="status">

                                Active Service

                            </label>

                        </div>


                        <!-- Buttons -->

                        <div class="d-flex gap-2">

                            <button type="submit"
                                    class="btn btn-primary">

                                Add Service

                            </button>

                            <a href="/admin/services"
                               class="btn btn-secondary">

                                Cancel

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>