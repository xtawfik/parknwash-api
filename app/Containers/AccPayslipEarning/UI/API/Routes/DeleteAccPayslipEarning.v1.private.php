<?php

/**
 * @apiGroup           AccPayslipEarning
 * @apiName            deleteAccPayslipEarning
 *
 * @api                {DELETE} /v1/acc_payslip_earning/:id Endpoint title here..
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
$router->delete('acc_payslip_earning/{id}', [
    'as' => 'api_accpayslipearning_delete_acc_payslip_earning',
    'uses'  => 'Controller@deleteAccPayslipEarning',
    'middleware' => [
      'auth:api',
    ],
]);
