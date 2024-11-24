<!-- resources/views/order/pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - PDF</title>
    <style>
        /* Tambahkan CSS sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Order History</h2>
    <p><strong>User Name:</strong> {{ $user->name }}</p>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Transaction Date</th>
                <th>Quantity</th>
                <th>Address</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->product->name }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>{{ $transaction->address }}</td>
                    <td>{{ $transaction->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
