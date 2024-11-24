@extends('admin.app')

@section('content')
    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="col-sm-4">
                <div class="col-sm-1" style="position: relative; left: -15px;">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Transaction</h1>
                    </div>
                </div>
            </div>
        </header>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                                <a href="{{ route('transactions.create') }}" class="btn text-white"
                                    style="background-color:#f4623a">Create New Data</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Name</th>
                                            <th>User Name</th>
                                            <th>Transaction Date</th>
                                            <th>Quantity</th>
                                            <th>Address</th>
                                            <th>Picture</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ optional($transaction->product)->name }}</td>
                                                <td>{{ optional($transaction->user)->name }}</td>
                                                <td>{{ $transaction->transaction_date }}</td>
                                                <td>{{ $transaction->quantity }}</td>
                                                <td>{{ $transaction->address }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/transaction-picture/' . $transaction->picture) }}"alt=""
                                                        width="100">
                                                </td>
                                                <td>{{ $transaction->status }}</td>
                                                <td>@include('admin.actionTransaction')</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
