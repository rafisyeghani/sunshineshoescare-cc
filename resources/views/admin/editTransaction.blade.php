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
    <div class="container mt-5">
        <form action="{{ route('transactions.update', ['transaction' => $transaction->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi bi-pencil-square fs-1"></i>
                        <h4>Edit Transaction</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="product_id" class="form-label">Product Name</label>
                            <select name="product_id" id="product_id" class="form-select">
                                @php
                                    $selected = '';
                                    if ($errors->any()) {
                                        $selected = old('product_id');
                                    } else {
                                        $selected = $transaction->product_id;
                                    }
                                @endphp
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $selected == $product->id ? 'selected' : '' }}>
                                        {{ $product->id . ' -   ' . $product->name}}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="user_id" class="form-label">User Name</label>
                            <select name="user_id" id="user_id" class="form-select">
                                @php
                                    $selected = '';
                                    if ($errors->any()) {
                                        $selected = old('user_id');
                                    } else {
                                        $selected = $transaction->user_id;
                                    }
                                @endphp
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $selected == $user->id ? 'selected' : '' }}>
                                        {{ $user->id . ' -   ' . $user->name}}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="transaction_date" class="form-label">Transaction Date</label>
                            <input class="form-control @error('transaction_date') is-invalid @enderror" type="date"
                                name="transaction_date" id="transaction_date"
                                value="{{ $errors->any() ? old('transaction_date') : $transaction->transaction_date }}"
                                placeholder="Enter Date">
                            @error('transaction_date')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        {{-- <div class="col-md-6 mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input class="form-control @error('quantity') is-invalid @enderror" type="text"
                                name="quantity" id="quantity"
                                value="{{ $errors->any() ? old('quantity') : $transaction->quantity }}"
                                placeholder="Enter Quantity">
                            @error('quantity')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div> --}}
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text"
                                name="address" id="address"
                                value="{{ $errors->any() ? old('address') : $transaction->address }}"
                                placeholder="Enter Address">
                            @error('address')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                <option value="Pending" {{ (old('status') ?? $transaction->status) == 'Process' ? 'selected' : '' }}>Process</option>
                                <option value="Completed" {{ (old('status') ?? $transaction->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="Cancelled" {{ (old('status') ?? $transaction->status) == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            @error('status')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('transactions.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
