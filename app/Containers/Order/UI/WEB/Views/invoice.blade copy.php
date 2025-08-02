<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
  <link href="{{storage_path('fonts/stylesheet.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style type="text/css">
    body {
      font-family: 'Cairo', Dubai W23, sans-serif;
      background: #fff;
      margin: 0;
      padding: 0;
    }
    .invoice-container {
      background: #fff;
      padding: 1rem;
      max-width: 900px;
      margin: 0 auto;
    }
    .header {
      background: none;
      border-radius: 0;
      margin-bottom: 1rem;
      color: #7c6e4c;
      text-align: center;
      border-bottom: 1px solid #b6ad95;
    }
    .header img {
      height: 150px;
      background: none;
      padding: 0;
      margin-bottom: 0.5rem;
    }
    .form-title {
      color: #7c6e4c;
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 0.2rem;
      text-align: center;
    }
    .form-title-en {
      color: #888;
      font-size: 1.1rem;
      text-align: center;
      margin-bottom: 1.2rem;
    }
    .section-header {
      background: #7c6e4c;
      color: #fff;
      font-weight: bold;
      font-size: 1rem;
      text-align: center;
      padding: 0.5rem 0;
      border-radius: 0;
      border: none;
      writing-mode: vertical-rl;
      text-orientation: mixed;
    }
    .section-main-title {
      color: #7c6e4c;
      font-size: 1.2rem;
      font-weight: bold;
      text-align: center;
      margin: 2rem 0 0.5rem 0;
      padding: 0.7rem 0;
      border-radius: 4px;
    }
    table.bordered {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 1.2rem;
      background: #fff;
      border-radius: 0;
      box-shadow: none;
    }
    table.bordered th, table.bordered td {
      border: 1.5px solid #7c6e4c;
      padding: 0.7rem 0.5rem;
      text-align: right;
      font-size: 1rem;
      background: #fff;
      color: #222;
    }
    table.bordered th {
      background: #f7f6f1;
      font-weight: 600;
      color: #7c6e4c;
      text-align: center;
    }
    .footer {
      text-align: center;
      color: #888;
      font-size: 0.95rem;
      margin-top: 2rem;
      border-top: 1px solid #b6ad95;
      padding-top: 0.5rem;
    }
    .invoice-title {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #222;
    }
    .invoice-title strong {
      font-size: 1.3rem;
      color: #222;
      display: block;
    }
    .order-date {
      font-size: 1rem;
      color: #7c6e4c;
      margin-bottom: 0.5rem;
      text-align: center;
    }
  </style>
</head>
<body>
<div class="invoice-container">
  <div class="header" style="text-align: center;">
    <img src="{{asset('images/logo.png')}}" alt="Logo" style="display: inline-block; margin: 0 auto;"/>
  </div>
  <div class="form-title">نموذج فاتورة</div>
  <div class="form-title-en">INVOICE FORM</div>
  <div class="invoice-title" style="text-align: center; display: block; margin-bottom: 1.5rem;">
    <strong style="display: block; font-size: 1.3rem; color: #222;">فاتورة رقم #{{$id}}</strong>
    <div style="display: block;">
      <strong style="display: block; font-size: 1.3rem; color: #222;">Invoice Number #{{$id}}</strong>
      <div class="order-date" style="display: block; text-align: center; color: #7c6e4c; font-size: 1rem; margin-bottom: 0.5rem;">
        {{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y - h:i A')}}
      </div>
    </div>
  </div>
  <h3 class="section-main-title">بيانات العميل - Customer Information</h3>
  <table class="bordered">
    <tr>
      <th style="width: 50%;">رقم الجوال<br/><span style="color:#888;font-size:0.95em;">Mobile</span></th>
      <th style="width: 50%;">رقم السيارة<br/><span style="color:#888;font-size:0.95em;">Car Number</span></th>
    </tr>
    <tr>
      <td>{{$client->phone}}</td>
      <td>{{$order->car->plate_number}}</td>
    </tr>
  </table>
  <h3 class="section-main-title">تفاصيل الطلب - Order Details</h3>
  <table class="bordered">
    <tr>
      <th style="width: 33.3%;">تاريخ الطلب<br/><span style="color:#888;font-size:0.95em;">Order Date</span></th>
      <th style="width: 33.3%;">الخدمة<br/><span style="color:#888;font-size:0.95em;">Service</span></th>
      <th style="width: 33.3%;">الموقع<br/><span style="color:#888;font-size:0.95em;">Location</span></th>
    </tr>
    <tr>
      <td>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y - h:i A')}}</td>
      <td>{{$order->service->car->name_en}} - {{$order->service->service_type->name_en}}</td>
      <td>{{$order->mall->name_en}}</td>
    </tr>
  </table>
  <h3 class="section-main-title">الدفع - Payment</h3>
  <table class="bordered">
    <tr>
      <th style="width: 50%;">اجمالي الطلب<br/><span style="color:#888;font-size:0.95em;">Order Total</span></th>
      <th style="width: 50%;">طريقة الدفع<br/><span style="color:#888;font-size:0.95em;">Payment Method</span></th>
    </tr>
    <tr>
      <td>{{$order->total}} KWD</td>
      <td>{{$order->payment_method}}</td>
    </tr>
  </table>
  <div class="footer">
    تاريخ الاصدار: {{\Carbon\Carbon::now()->format('d-m-Y الساعة h:i A')}}
  </div>
</div>
</body>
</html>
