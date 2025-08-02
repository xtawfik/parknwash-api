<?php

/**
 * @apiGroup           AccPayslipEarning
 * @apiName            createAccPayslipEarning
 *
 * @api                {POST} /v1/acc_payslip_earning Endpoint title here..
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
$router->post('acc_payslip_earning', [
    'as' => 'api_accpayslipearning_create_acc_payslip_earning',
    'uses'  => 'Controller@createAccPayslipEarning',
    'middleware' => [
      'auth:api',
    ],
]);
