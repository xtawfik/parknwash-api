<?php

/**
 * @apiGroup           AccPayslip
 * @apiName            createAccPayslip
 *
 * @api                {POST} /v1/acc_payslip Endpoint title here..
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
$router->post('acc_payslip', [
    'as' => 'api_accpayslip_create_acc_payslip',
    'uses'  => 'Controller@createAccPayslip',
    'middleware' => [
      'auth:api',
    ],
]);
