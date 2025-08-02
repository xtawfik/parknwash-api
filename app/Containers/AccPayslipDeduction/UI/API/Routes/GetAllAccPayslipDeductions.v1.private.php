<?php

/**
 * @apiGroup           AccPayslipDeduction
 * @apiName            getAllAccPayslipDeductions
 *
 * @api                {GET} /v1/acc_payslip_deduction Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('acc_payslip_deduction', [
    'as' => 'api_accpayslipdeduction_get_all_acc_payslip_deductions',
    'uses'  => 'Controller@getAllAccPayslipDeductions',
    'middleware' => [
      'auth:api',
    ],
]);
