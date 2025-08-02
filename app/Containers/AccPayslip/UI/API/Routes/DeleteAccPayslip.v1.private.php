<?php

/**
 * @apiGroup           AccPayslip
 * @apiName            deleteAccPayslip
 *
 * @api                {DELETE} /v1/acc_payslip/:id Endpoint title here..
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
$router->delete('acc_payslip/{id}', [
    'as' => 'api_accpayslip_delete_acc_payslip',
    'uses'  => 'Controller@deleteAccPayslip',
    'middleware' => [
      'auth:api',
    ],
]);
