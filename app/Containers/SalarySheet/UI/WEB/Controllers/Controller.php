<?php

namespace App\Containers\SalarySheet\UI\WEB\Controllers;

use App\Containers\Employee\Models\Employee;
use App\Containers\Mall\Models\Mall;
use App\Containers\SalarySheet\Models\SalarySheet;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Support\Facades\App;
use PDF;

/**
 * Class Controller
 *
 * @author  Mohamed Tawfik <contact@mohamedtawfik.me>
 */
class Controller extends WebController {

  public function generatePayslip($id) {
    $payslip = SalarySheet::find($id);
    $mall = Mall::find($payslip->mall_id);

    $pdf = App::make( 'snappy.pdf.wrapper' );
    $pdf->loadView( 'salarysheet::payslip', compact('payslip', 'mall') );

    return $pdf->inline( 'payslip.pdf' );
  }

  public function payslipSend($id){
    $payslip = SalarySheet::find($id);
    $employee = Employee::find($payslip->employee_id);
    $mobile = $employee->phone ? "965".$employee->phone : "";

    $month_name = date('F', mktime(0, 0, 0, $payslip->month, 10));

    // Generate wa.me link with link to the payslip
    $waLink = 'https://wa.me/'.$mobile.'?text=Your%20payslip%20for%20the%20month%20of%20'.$month_name.'%20'.$payslip->year.'%20is%20ready.%20Please%20click%20on%20the%20link%20below%20to%20view%20it.%0A%0A'.route('get_payslip', $payslip->id);

    return redirect($waLink);
  }
}
