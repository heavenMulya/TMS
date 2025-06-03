<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Receipt - {{ $payment->receipt_number }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f7f7f7;
      margin: 0;
      padding: 20px;
    }
    .receipt {
      background: white;
      padding: 40px;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      position: relative;
    }
    h1 {
      text-align: center;
      letter-spacing: 2px;
    }
    .logo {
    
      font-size: 32px;
      color: #e94e1b;
      margin-top: -20px;
    }
    .address, .section {
      margin-bottom: 20px;
    }
    .section {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
    }
    .totals {
      margin-top: 20px;
      text-align: right;
    }
    .totals p {
      margin: 4px 0;
    }
    .total-amount {
      font-size: 20px;
      font-weight: bold;
      color: #e94e1b;
    }
    .signature {
      margin-top: 20px;
      text-align: right;
      font-style: italic;
    }
    .terms {
      font-size: 12px;
      color: #555;
      margin-top: 30px;
    }
    .thank-you {
      text-align: right;
      font-size: 24px;
      color: #e94e1b;
      font-weight: bold;
    }
  </style>
</head>
<body onload="window.print()">
  <div class="receipt">
  <div class="logo"><img src="{{ asset('assets/image/logo.svg') }}" alt="Company Logo"></div>
    <h1>Room Payment Receipt</h1>
    

    <div class="section">
      <div><strong>Landlord Name</strong><br>Harryson</div>
      <div><strong>Tenant Name</strong><br>{{ $payment->tenant->full_name }}</div>
    </div>

    <div class="section">
      <div><strong>Receipt Number</strong><br>{{ $payment->receipt_number }}</div>
      <div><strong>Receipt Date</strong><br>{{ $payment->payment_date }}</div>
      <div><strong>Month Paid For</strong><br>{{ $payment->month_paid_for }}</div>
    </div>

    <div class="totals">
      <p>Paide Amount:{{ $payment->amount }}/=</p>
    </div>

    <div class="signature">[Landlord Signature Image Here]</div>

    <div class="terms">
      <p>0689387277<br>heavenlyamuya45@gmail.com<br>Account Number: 12345678</p>
    </div>

    <div class="thank-you">Thank you</div>
  </div>
</body>
</html>
