<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Receipt - {{ $expenses->title }}</title>
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
        .header, .footer {
            text-align: center;
        }
        .header h1 {
            font-size: 30px;
            letter-spacing: 3px;
            margin-bottom: 0;
        }
        .company {
            font-weight: bold;
            color: #f15b2a;
            margin-top: -10px;
        }
        .info, .terms {
            margin: 20px 0;
        }
        .info-table, .items {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table td {
            padding: 5px;
            vertical-align: top;
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
        }
    </style>
</head>
<body>
    <div class="receipt-box">
    <div class="company"><img src="{{ asset('assets/image/logo.svg') }}" alt="Company Logo"></div>
        <div class="header"> 
    <h1>Expenses List</h1>         
    </div>
        <table class="info-table">
            <tr>
                <td><strong>Expense Name</strong><br>{{ $expenses->title }}</td>
                <td><strong>Expenses Date</strong><br>{{ \Carbon\Carbon::parse($expenses->expense_date)->format('d/m/Y') }}</td>
            </tr>
        </table>

        <table class="items" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>QTY</th>
                    <th>DESCRIPTION</th>
                    <th>UNIT PRICE</th>
                    <th>AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $expenses->description ?? 'No description provided' }}</td>
                    <td>{{ number_format($expenses->amount, 2) }}</td>
                    <td>{{ number_format($expenses->amount, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="3">TOTAL</td>
                    <td>{{ number_format($expenses->amount, 2) }} /=</td>
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
