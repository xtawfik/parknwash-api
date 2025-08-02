<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style type="text/css">
    body {
      font-family: 'Cairo', Dubai W23, sans-serif;
      background: #fff;
      margin: 0;
      padding: 0;
    }
    .form-container {
      background: #fff;
      padding: 2rem 1.5rem;
      padding-bottom: 0.5rem;
      margin-bottom: 2rem;
      max-width: 900px;
      margin: 1rem auto;
      border-radius: 10px;
      box-shadow: none;
      border: 1px solid #b6ad95;
      position: relative;
      overflow: hidden;
    }
    .form-container::before {
      content: '';
      position: absolute;
      top: 30px;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('{{ asset('images/invoice_bg.png') }}') center center / contain no-repeat;
      opacity: 0.05;
      z-index: 0;
      pointer-events: none;
    }
    .form-container > * {
      position: relative;
      z-index: 1;
    }
    .header {
      text-align: center;
      margin-bottom: 1.5rem;
    }
    .header img {
      height: 130px;
      margin-bottom: 0.5rem;
    }
    .form-title-ar {
      color: #7c6e4c;
      font-size: 1.3rem;
      font-weight: bold;
      margin-bottom: 0.2rem;
      text-align: center;
    }
    .form-title-en {
      color: #7c6e4c;
      font-size: 1.1rem;
      text-align: center;
      margin-bottom: 1.2rem;
      font-weight: bold;
      letter-spacing: 0.5px;
    }
    .row {
      display: flex;
      flex-direction: row;
      gap: 1rem;
      margin-bottom: 1rem;
    }
    .row .col {
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    .label-box {
      background: #ab9864;
      color: #fff;
      font-weight: bold;
      font-size: 0.9rem;
      text-align: center;
      padding: 0.1rem;
      border-radius: 0;
      writing-mode: vertical-rl;
      text-orientation: mixed;
      min-width: 40px;
      align-items: center;
      justify-content: center;
      display: flex;
    }
    .section {
      display: flex;
      flex-direction: row;
      margin-bottom: 1.5rem;
      border: 1px solid #b6ad95;
      border-radius: 10px;
      overflow: hidden;
      align-items: stretch;
    }
    .section-content {
      flex: 1;
      padding: 1rem 1.5rem;
      display: flex;
      flex-direction: column;
      gap: 0.2rem;
    }
    .field-row {
      display: flex;
      align-items: center;
      gap: 1rem;
      border-bottom: 1px solid #b6ad95;
    }
    .field-row:last-child {
      border-bottom: none;
    }
    .field-label-ar-wrapper,
    .field-label-en-wrapper {
      flex: 1;
      display: flex;
      align-items: center;
    }
    .field-label-ar-wrapper {
      justify-content: flex-start;
    }
    .field-label-en-wrapper {
      justify-content: flex-end;
    }
    .field-label-ar,
    .field-label-en {
      color: #7c6e4c;
      font-weight: 600;
      font-size: 0.9rem;
    }
    .field-label-ar {
      text-align: right;
    }
    .field-label-en {
      text-align: left;
    }
    .field-value {
      color: #222;
      font-size: 0.9rem;
      border-radius: 0;
      padding: 0.4rem 0.7rem;
      word-break: break-word;
      text-align: center;
      margin-left: 1rem;
      margin-right: 1rem;
    }
    .footer {
      text-align: center;
      color: #888;
      font-size: 0.95rem;
      margin-top: 0.5rem;
      border-top: 1px solid #b6ad95;
      padding-top: 0.5rem;
    }
    .top-info-container {
      border: 1px solid #b6ad95;
      margin-bottom: 1.5rem;
      font-size: 0.9rem;
      border-radius: 10px;
      overflow: hidden;
    }
    .top-info-row {
      display: flex;
      align-items: stretch;
    }
    .top-info-row:first-child {
      border-bottom: 1px solid #b6ad95;
    }
    .top-info-label-en,
    .top-info-label-ar {
      background-color: #ab9864;
      color: #fff;
      padding: 0.6rem 1rem;
      font-weight: bold;
      display: flex;
      align-items: center;
      white-space: nowrap;
      min-width: 100px;
    }
    .top-info-label-en {
      justify-content: flex-end;
      text-align: left;
    }
    .top-info-label-ar {
      justify-content: flex-start;
      text-align: right;
    }
    .top-info-value {
      flex-grow: 1;
      color: #222;
      padding: 0.6rem 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    @media (max-width: 700px) {
      .form-container { padding: 0.5rem; }
      .section { flex-direction: column; }
      .label-box { writing-mode: horizontal-tb; min-width: 0; }
      .section-content { padding: 1rem 0.5rem; }
    }
    .employee-image-vertical {
      width: 120px;
      height: 100%;
      object-fit: cover;
      border-radius: 0;
      margin-right: 10px;
      margin-left: 0;
      align-self: stretch;
      display: block;
    }
    .employee-image-vertical-outside {
      width: 80px;
      height: auto;
      max-height: 100%;
      object-fit: cover;
      border-radius: 10px;
      margin: 10px;
      align-self: stretch;
      display: block;
    }
  </style>
</head>
<body>
<div class="form-container">
  <div class="header">
    <img src="{{asset('images/logo_dark.png')}}" alt="Logo" />
    <div style="margin-top: 10px; color: #ab9864; font-size: 1.3rem; font-weight: bold; letter-spacing: 1px;">Invoice Details</div>
  </div>
  
  <div class="top-info-container">
    <div class="top-info-row">
      <div class="top-info-label-ar">رقم الفاتورة</div>
      <div class="top-info-value" style="font-weight: bold; font-size: 1.1rem;">{{$id}}</div>
      <div class="top-info-label-en">Invoice No</div>
    </div>
    <div class="top-info-row">
      <div class="top-info-label-ar">التاريخ</div>
      <div class="top-info-value">
        @php
          $createdAt = \Carbon\Carbon::parse($order->created_at);
          $dayName = $createdAt->locale('ar')->isoFormat('dddd');
          $date = $createdAt->format('d/m/Y');
        @endphp
        {{$dayName}} - {{$date}}
      </div>
      <div class="top-info-label-en">Date</div>
    </div>
  </div>

  <div class="section">
    <div class="label-box">الموظف</div>
    <img src="{{$employee_image}}" alt="Employee Image" class="employee-image-vertical-outside" />
    <div class="section-content">
      <div class="field-row">
        <div class="field-label-ar-wrapper">
          <span class="field-label-ar">اسم الموظف</span>
        </div>
        <div class="field-value" style="padding-left: 90px;">{{$employee->name_en ?? '-'}}</div>
        <div class="field-label-en-wrapper">
          <span class="field-label-en">Employee Name</span>
        </div>
      </div>
      <div class="field-row">
        <div class="field-label-ar-wrapper">
          <span class="field-label-ar">كود الموظف</span>
        </div>
        <div class="field-value" style="padding-left: 90px;">{{$employee->employee_code ?? '-'}}</div>
        <div class="field-label-en-wrapper">
          <span class="field-label-en">Employee Code</span>
        </div>
      </div>
    </div>
    <div class="label-box">Employee</div>
  </div>

  <div class="section">
    <div class="label-box">العميل</div>
    <div class="section-content">
      <div class="field-row">
        <div class="field-label-ar-wrapper">
          <span class="field-label-ar">رقم الجوال</span>
        </div>
        <div class="field-value">{{$client->phone}}</div>
        <div class="field-label-en-wrapper">
          <span class="field-label-en">Mobile</span>
        </div>
      </div>
      <div class="field-row">
        <div class="field-label-ar-wrapper">
          <span class="field-label-ar">رقم السيارة</span>
        </div>
        <div class="field-value">{{$order->car->plate_number}}</div>
        <div class="field-label-en-wrapper">
          <span class="field-label-en">Car Number</span>
        </div>
      </div>
      <div class="field-row">
        <div class="field-label-ar-wrapper">
          <span class="field-label-ar">موديل السيارة</span>
        </div>
        <div class="field-value">{{$order->car_model->name ?? '-'}}</div>
        <div class="field-label-en-wrapper">
          <span class="field-label-en">Car Model</span>
        </div>
      </div>
    </div>
    <div class="label-box">Customer</div>
  </div>

  <div class="section">
    <div class="label-box">تفاصيل الطلب</div>
    <div class="section-content">
      <div class="field-row">
        <div class="field-label-ar-wrapper">
          <span class="field-label-ar">تاريخ الطلب</span>
        </div>
        <div class="field-value">
          @php
            $createdAt = \Carbon\Carbon::parse($order->created_at);
            $dayName = $createdAt->locale('ar')->isoFormat('dddd');
            $date = $createdAt->format('d-m-Y الساعة h:i A');
          @endphp
          {{$dayName}} - {{$date}}
        </div>
        <div class="field-label-en-wrapper">
          <span class="field-label-en">Order Date</span>
        </div>
      </div>
      <div class="field-row">
        <div class="field-label-ar-wrapper">
          <span class="field-label-ar">الخدمة</span>
        </div>
        <div class="field-value">{{$order->service->car->name_en}} - {{$order->service->service_type->name_en}}</div>
        <div class="field-label-en-wrapper">
          <span class="field-label-en">Service</span>
        </div>
      </div>
      <div class="field-row">
        <div class="field-label-ar-wrapper">
          <span class="field-label-ar">الموقع</span>
        </div>
        <div class="field-value">{{$order->mall->name_en}}</div>
        <div class="field-label-en-wrapper">
          <span class="field-label-en">Location</span>
        </div>
      </div>
    </div>
    <div class="label-box">Order Details</div>
  </div>

  <div class="section">
    <div class="label-box">الدفع</div>
    <div class="section-content">
      <div class="field-row">
        <div class="field-label-ar-wrapper">
          <span class="field-label-ar">اجمالي الطلب</span>
        </div>
        <div class="field-value" style="direction: ltr;">{{$order->total}} KWD</div>
        <div class="field-label-en-wrapper">
          <span class="field-label-en">Order Total</span>
        </div>
      </div>
      <div class="field-row">
        <div class="field-label-ar-wrapper">
          <span class="field-label-ar">طريقة الدفع</span>
        </div>
        <div class="field-value">
          @php
            $paymentMethodMap = [
              'cash' => 'Cash',
              'visa' => 'Credit Card',
              'wallet' => 'Wallet Balance',
            ];
            $paymentMethod = $paymentMethodMap[$order->payment_method] ?? $order->payment_method;
          @endphp
          {{$paymentMethod}}
        </div>
        <div class="field-label-en-wrapper">
          <span class="field-label-en">Payment Method</span>
        </div>
      </div>
    </div>
    <div class="label-box">Payment</div>
  </div>

  <div class="footer">
    تاريخ الاصدار: {{\Carbon\Carbon::now()->format('d-m-Y الساعة h:i A')}}
  </div>
</div>
</body>
</html>
