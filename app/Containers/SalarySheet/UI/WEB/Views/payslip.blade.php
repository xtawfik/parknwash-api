{{--
Referense:

protected $fillable = [
    #Fillables#
    'employee_id',
    'employee_name',
    'employee_code',
    'employee_nationality',
    'employee_designation',
    'employee_civil_id',
    'employee_work_status',
    'employee_image',
    'employee_join_date',
    'monthly_days',
    'working_days',
    'total_sales',
    'per_day',
    'basic_salary',
    'commission',
    'previous_due',
    'tips',
    'incentive',
    'housing',
    'transport',
    'medical',
    'bonus',
    'mobile',
    'food',
    'travelling',
    'gross_salary',
    'housing_d',
    'transport_d',
    'mobile_d',
    'loan',
    'absent',
    'advance',
    'sick_leave',
    'penalty',
    'total_deductions',
    'net_salary',
    'paid_salary',
    'relay',
    'paid_way',
    'paid_date',
    'branch',
    'month',
    'year',
    'mall_id',
    'mall_name'
  ];
--}}

  <!doctype html>
<html lang="en" dir="ltr">
<link href="{{storage_path('fonts/stylesheet.css')}}" rel="stylesheet" type="text/css">
<head>
  <meta charset="UTF-8">
  <title>Pay Slip</title>

  <style type="text/css">
    body {
      font-family: Dubai W23, sans-serif;
    }

    ul {
      margin: 0;
    }

    .large {
      font-size: 22px;
    }

    .underline {
      text-decoration: underline;
    }

    .medium, strong {
      font-size: 18px;
      font-weight: 500;
    }

    thead th {
      font-weight: 500;
      font-size: 18px;
    }

    .gray {
      background-color: lightgray
    }

    table.no-border {
      border-collapse: collapse;
    }

    table.no-border td, table.no-border th {
      border: none !important;
      padding: 0.2rem 0.5rem 0.2rem 0.5rem;
      text-align: left;
    }

    table.bordered {
      border-radius: 7px;
    }

    table.bordered td, table.bordered th {
      border: 1px solid #999;
      padding: 0.2rem 0.5rem 0.2rem 0.5rem;
      text-align: left;
      border-radius: 7px;
    }

    table.centered td, table.centered th {
      text-align: center;
    }

    .break {
      page-break-before: auto;
      page-break-inside: avoid;
    }

    .header {
      background: #19214C;
      padding: 10px;
      padding-top: 15px;
    }
  </style>

</head>
<body>

<table width="100%">
  <tr>
    <td align="center">
      <img src="{{asset('images/logo_light.png')}}" alt="" height="75" />
    </td>
  </tr>
</table>

<table width="100%">
  <tr>
    <td align="center">
      <strong style="height: 50px;font-size: 28px;font-weight: bold;">
        Pay Slip - {{Carbon\Carbon::parse($payslip->year . "-" .$payslip->month)->format('F')}}  {{$payslip->year}}
      </strong>
    </td>
  </tr>
  <tr>
    <td align="center">
      <strong style="height: 50px;font-size: 24px;font-weight: bold;">
        {{$payslip->employee_name}}
      </strong>
    </td>
  </tr>
</table>

<br/>

<table width="100%" class="bordered">
  <tbody>
  <tr>
    <td rowspan="3" width="100" valign="middle">
      <img src="{{$payslip->employee_image}}" width="100" height="100" style="border-radius: 7px;" />
    </td>
    <td><strong>Employee Code</strong></td>
    <td>{{$payslip->employee_code}}</td>
    <td><strong>Branch</strong></td>
    <td>{{$payslip->mall ? $payslip->mall->name_en : '----'}}</td>
  </tr>
  <tr>
    <td><strong>Job Description</strong></td>
    <td>{{$payslip->employee_designation}}</td>
    <td><strong>Nationality</strong></td>
    <td>{{$payslip->employee_nationality}}</td>
  </tr>
  <tr>
    <td><strong>Civil ID</strong></td>
    <td>{{$payslip->employee_civil_id}}</td>
    <td><strong>Join Date</strong></td>
    <td>{{\Carbon\Carbon::parse($payslip->employee_join_date)->format('d/m/Y')}}</td>
  </tr>
  </tbody>
</table>


<table width="100%">
  <tr>
    <td style="height: 50px;font-size: 20px;"><strong>Salary Breakdown</strong></td>
  </tr>
</table>

<table width="100%" class="bordered">
  <thead style="background-color: lightgray;">
  <tr>
    <th width="350">Commissions and Allowances</th>
    <th width="250">Deductions</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>
      <table width="100%" class="no-border">
        <tbody>
        <tr>
          <td><strong>Basic Salary</strong></td>
          <td>{{number_format($payslip->basic_salary, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Commission</strong></td>
          <td>{{number_format($payslip->commission, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Previous Due</strong></td>
          <td>{{number_format($payslip->previous_due, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Tips</strong></td>
          <td>{{number_format($payslip->tips, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Incentive</strong></td>
          <td>{{number_format($payslip->incentive, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Housing</strong></td>
          <td>{{number_format($payslip->housing, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Transport</strong></td>
          <td>{{number_format($payslip->transport, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Medical</strong></td>
          <td>{{number_format($payslip->medical, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Bonus</strong></td>
          <td>{{number_format($payslip->bonus, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Mobile</strong></td>
          <td>{{number_format($payslip->mobile, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Food</strong></td>
          <td>{{number_format($payslip->food, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Travelling</strong></td>
          <td>{{number_format($payslip->travelling, 2)}} KWD</td>
        </tr>
        <tr style="background-color: #efefef;">
          <td><strong>Gross Salary</strong></td>
          <td class="large"><strong style="font-weight: bold;color: green;">{{number_format($payslip->gross_salary, 2)}} KWD</strong></td>
        </tr>
        </tbody>
      </table>
    </td>
    <td valign="top" width="50%">
      <table width="100%" class="no-border">
        <tbody>
        <tr>
          <td><strong>Housing</strong></td>
          <td>{{number_format($payslip->housing_d, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Transport</strong></td>
          <td>{{number_format($payslip->transport_d, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Mobile</strong></td>
          <td>{{number_format($payslip->mobile_d, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Loan</strong></td>
          <td>{{number_format($payslip->loan, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Absent</strong></td>
          <td>{{number_format($payslip->absent, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Advance</strong></td>
          <td>{{number_format($payslip->advance, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Sick Leave</strong></td>
          <td>{{number_format($payslip->sick_leave, 2)}} KWD</td>
        </tr>
        <tr>
          <td><strong>Penalty</strong></td>
          <td>{{number_format($payslip->penalty, 2)}} KWD</td>
        </tr>
        <tr style="background-color: #efefef;">
          <td><strong>Total Deductions</strong></td>
          <td class="large"><strong style="font-weight: bold;color: red">{{number_format($payslip->total_deductions, 2)}} KWD</strong></td>
        </tr>
        </tbody>
      </table>
    </td>
  </tr>
  </tbody>
</table>

<br/>

<table width="100%" class="bordered">
  <thead style="background-color: lightgray;">
  <tr>
    <th width="150">Net Salary</th>
    <th width="250">Paid Salary</th>
    <th width="250">Relay</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td class="large" style="background: #baffba;"><strong style="font-weight: bold;">{{number_format($payslip->net_salary, 2)}} KWD</strong></td>
    <td class="large"><strong>{{number_format($payslip->paid_salary, 2)}} KWD</strong></td>
    <td class="large"><strong>{{number_format($payslip->relay, 2)}} KWD</strong></td>
  </tr>
  </tbody>
</table>

<br/>

<table width="100%" class="bordered">
  <thead style="background-color: lightgray;">
  <tr>
    <th width="150">Sign here</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td class="large">
      <strong>_________________________</strong>
    </td>
  </tr>
  </tbody>
</table>

<br/>

<p>
  Printed at: {{\Carbon\Carbon::now()->format('d-m-Y h:i A')}}
</p>

</body>
</html>
