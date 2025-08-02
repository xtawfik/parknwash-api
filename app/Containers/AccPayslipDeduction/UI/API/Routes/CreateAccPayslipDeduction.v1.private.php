<?php

/**
 * @apiGroup           AccPayslipDeduction
 * @apiName            createAccPayslipDeduction
 *
 * @api                {POST} /v1/acc_payslip_deduction Endpoint title here..
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
$router->post('acc_payslip_deduction', [
    'as' => 'api_accpayslipdeduction_create_acc_payslip_deduction',
    'uses'  => 'Controller@createAccPayslipDeduction',
    'middleware' => [
      'auth:api',
    ],
]);
