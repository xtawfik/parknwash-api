<?php

/**
 * @apiGroup           AccPayslip
 * @apiName            updateAccPayslip
 *
 * @api                {POST} /v1/acc_payslip/:id Endpoint title here..
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
$router->post('acc_payslip/{id}', [
    'as' => 'api_accpayslip_update_acc_payslip',
    'uses'  => 'Controller@updateAccPayslip',
    'middleware' => [
      'auth:api',
    ],
]);
