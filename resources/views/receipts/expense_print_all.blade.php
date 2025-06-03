<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>All Expenses Receipts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #000;
            background: #fff;
            margin: 0;
            padding: 40px;
        }
        .receipt-box {
            max-width: 700px;
            margin: auto;
            padding: 30px;
            border: 2px solid #f15b2a;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        }
        .header {
            text-align: center;
        }
        .header h1 {
            font-size: 30px;
            letter-spacing: 3px;
            margin-bottom: 0;
        }
        .company {
            text-align: center;
            margin-bottom: 10px;
        }
        .company img {
            height: 50px;
        }
        .items {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .items th, .items td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .items th {
            background-color: #f15b2a;
            color: white;
        }
        .total-row {
            font-weight: bold;
            text-align: right;
        }
        .thank-you {
            text-align: right;
            color: #f15b2a;
            font-size: 24px;
            margin-top: 30px;
        }
        .terms {
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="receipt-box">
    <div class="company">
        <img src="{{ asset('assets/image/logo.svg') }}" alt="Company Logo">
    </div>

    <div class="header">
        <h1>Expenses Receipt</h1>
    </div>

    <table class="items">
        <thead>
            <tr>
                <th>QTY</th>
                <th>EXPENSE NAME</th>
                <th>DESCRIPTION</th>
                <th>DATE</th>
                <th>AMOUNT</th>
            </tr>
        </thead>
        <tbody>
    @php 
        $total = 0;
        $counter = 1;
    @endphp
    @foreach ($expenses as $expense)
        @php 
            $total += $expense->amount; 
        @endphp
        <tr>
            <td>{{ $counter++ }}</td> {{-- This counts 1, 2, 3... --}}
            <td>{{ $expense->title }}</td>
            <td>{{ $expense->description ?? 'No description' }}</td>
            <td>{{ \Carbon\Carbon::parse($expense->expense_date)->format('d/m/Y') }}</td>
            <td>{{ number_format($expense->amount, 2) }}</td>
        </tr>
    @endforeach
    <tr class="total-row">
        <td colspan="4">TOTAL</td>
        <td>{{ number_format($total, 2) }} /=</td>
    </tr>
</tbody>

    </table>

    <div class="terms">
        <p>0689387277<br>heavenlyamuya45@gmail.com<br>Account Number: 12345678</p>
    </div>

    <div class="thank-you">Thank you</div>
</div>

</body>
</html>
