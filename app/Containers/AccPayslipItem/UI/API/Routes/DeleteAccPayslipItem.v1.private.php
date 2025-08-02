<?php

/**
 * @apiGroup           AccPayslipItem
 * @apiName            deleteAccPayslipItem
 *
 * @api                {DELETE} /v1/acc_payslip_item/:id Endpoint title here..
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
$router->delete('acc_payslip_item/{id}', [
    'as' => 'api_accpayslipitem_delete_acc_payslip_item',
    'uses'  => 'Controller@deleteAccPayslipItem',
    'middleware' => [
      'auth:api',
    ],
]);
