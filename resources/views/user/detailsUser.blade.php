<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    @vite('resources/sass/app.scss')
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4 d-flex justify-content-center align-items-center min-vh-100">
        <hr>
        <div class="d-flex align-items-center py-5 px-5 bg-light rounded-3 border shadow">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('storage/product-picture/'.$product->picture) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Detail</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5><br>
                                <div class="col-md-12 mb-3">
                                    <label for="id" class="form-label">Item ID:</label>
                                    <h5>{{ $product->id }}</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="price" class="form-label">Price:</label>
                                    <h5>Rp. {{ $product->price }}</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="stock" class="form-label">Stock:</label>
                                    <h5>{{ $product->stock }}</h5>
                                </div>
                            </div>
                        </div>
                        <ul class="w-100 list-unstyled d-flex mb-0">
                            <li class="me-3">
                                <a href="{{ url('shopUser') }}" class="btn btn-outline-danger btn-lg mt-3">
                                    <i class="bi-arrow-left-circle me-2"></i> Cancel
                                </a>
                            </li>
                            <li>
                                <button id="checkoutBtn" class="btn btn-outline-success btn-lg mt-3">
                                    <i class="bi-arrow-right-circle me-2"></i> Checkout
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Login Prompt -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    You must log in first to proceed to checkout.
                </div>
                <div class="modal-footer">
                    <a href="/login" class="btn btn-primary">Login</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var isLoggedIn = false;

        document.getElementById('checkoutBtn').addEventListener('click', function(event) {
            event.preventDefault();
            if (!isLoggedIn) {
                $('#loginModal').modal('show');
            } else {
                window.location.href = '/checkout';
            }
        });
    </script>
</body>

</html>
