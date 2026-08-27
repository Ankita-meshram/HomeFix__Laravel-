<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Service - HomeFix</title>

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

                <div class="card-header bg-warning">

                    <h4 class="mb-0">
                        Edit Service
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


                    <form action="/admin/services/{{ $service->id }}"
                          method="POST">

                        @csrf

                        @method('PUT')


                        <!-- Service Name -->

                        <div class="mb-3">

                            <label class="form-label">
                                Service Name
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name', $service->name) }}"
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
                                      required>{{ old('description', $service->description) }}</textarea>

                        </div>


                        <!-- Price -->

                        <div class="mb-3">

                            <label class="form-label">
                                Price (₹)
                            </label>

                            <input type="number"
                                   name="price"
                                   class="form-control"
                                   min="0"
                                   value="{{ old('price', $service->price) }}"
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
                                   value="{{ old('image', $service->image) }}">

                        </div>


                        <!-- Status -->

                        <div class="form-check mb-4">

                            <input type="checkbox"
                                   name="status"
                                   value="1"
                                   class="form-check-input"
                                   id="status"
                                   {{ $service->status ? 'checked' : '' }}>

                            <label class="form-check-label"
                                   for="status">

                                Active Service

                            </label>

                        </div>


                        <button type="submit"
                                class="btn btn-warning">

                            Update Service

                        </button>

                        <a href="/admin/services"
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
