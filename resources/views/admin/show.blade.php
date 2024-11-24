<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>{{ $pageTitle }}</title> --}}
    @vite('resources/sass/app.scss')
</head>

<body>
    <div class="container mt-4">
        <h4>{{ $pageTitle }}</h4>
        <hr>
        <div class="d-flex align-items-center py-2 px-4 bg-light rounded-3 border">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('storage/product-picture/'.$product->picture) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Detail</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5><br>
                                <div class="col-md-12 mb-3">
                                    <label for="id" class="form-label">ID</label>
                                    <h5>{{ $product->id }}</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <h5>{{ $product->price }}</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <h5>{{ $product->stock }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
