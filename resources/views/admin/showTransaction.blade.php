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
                            <img src="{{ asset('storage/transaction-picture/'.$transaction->picture) }}" class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('transactions.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Detail</div>
                            <div class="card-body">
                                <div class="col-md-12 mb-3">
                                    <label for="product_id" class="form-label">Product Name</label>
                                    <h5>{{ optional($transaction->product)->name }}</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="user_id" class="form-label">User Name</label>
                                    <h5>{{ optional($transaction->user)->name }}</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="transaction_date" class="form-label">Transaction Date</label>
                                    <h5>{{ $transaction->transaction_date }}</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <h5>{{ $transaction->quantity }}</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <h5>{{ $transaction->address }}</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <h5>{{ $transaction->status }}</h5>
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
