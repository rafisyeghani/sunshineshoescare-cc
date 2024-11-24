@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h4>{{ $pageTitle }}</h4>
        <hr>
        @if ($transactions->isEmpty())
            <p>No transactions found.</p>
        @else
            @foreach ($transactions as $transaction)
                <div class="d-flex align-items-center py-2 px-4 bg-light rounded-3 border mb-4">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('storage/transaction-picture/'.$transaction->picture) }}" class="card-img-top" alt="...">
                                </div>
                                <div class="mt-3">
                                    <a href="{{ route('orders.exportPdf', $user->id) }}" class="btn btn-primary">Export PDF</a>
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
                                            <label for="address" class="form-label">Status</label>
                                            <h5>{{ $transaction->status }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
