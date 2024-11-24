    @extends('user.layoutsUser.app')

    @section('user.layoutsUser.content')
        <!-- Start Content -->
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-4 mx-auto">
                                <div class="card mb-4 product-wap rounded-2">
                                    <div class="card rounded-5 shadow">
                                        <img src="{{ asset('storage/product-picture/' . $product->picture) }}" alt=""
                                            class="d-block w-100 card-img rounded-2 img-fluid">
                                        <div
                                            class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                            <ul class="list-unstyled">
                                                <li><a class="btn btn-outline-light view-details" href="{{ route('detailsUser', $product->id) }}">View Details<i
                                                    class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="shop-single/{{ $product->id }}" class="h3 text-decoration-none fw-bold">{{ $product->name }}</a>
                                        <li class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                            <p class="mb-0 fst-italic">{{ $product->stock }} In Stock</p>
                                            <p class="mb-0 fw-light">Rp. {{ $product->price }}</p>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->
        <style>
            .view-details {
                transition: color 0.3s;
            }

            .view-details:hover {
                color: black;
            }
        </style>
    @endsection
