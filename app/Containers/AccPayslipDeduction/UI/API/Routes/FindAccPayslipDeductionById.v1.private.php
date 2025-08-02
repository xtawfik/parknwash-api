<?php

/**
 * @apiGroup           AccPayslipDeduction
 * @apiName            findAccPayslipDeductionById
 *
 * @api                {GET} /v1/acc_payslip_deduction/:id Endpoint title here..
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
$router->get('acc_payslip_deduction/{id}', [
    'as' => 'api_accpayslipdeduction_find_acc_payslip_deduction_by_id',
    'uses'  => 'Controller@findAccPayslipDeductionById',
    'middleware' => [
      'auth:api',
    ],
]);
