<?php

/**
 * @apiGroup           AccPayslipEarning
 * @apiName            updateAccPayslipEarning
 *
 * @api                {POST} /v1/acc_payslip_earning/:id Endpoint title here..
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
$router->post('acc_payslip_earning/{id}', [
    'as' => 'api_accpayslipearning_update_acc_payslip_earning',
    'uses'  => 'Controller@updateAccPayslipEarning',
    'middleware' => [
      'auth:api',
    ],
]);
