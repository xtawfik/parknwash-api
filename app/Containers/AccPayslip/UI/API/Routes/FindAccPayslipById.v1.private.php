<?php

/**
 * @apiGroup           AccPayslip
 * @apiName            findAccPayslipById
 *
 * @api                {GET} /v1/acc_payslip/:id Endpoint title here..
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
$router->get('acc_payslip/{id}', [
    'as' => 'api_accpayslip_find_acc_payslip_by_id',
    'uses'  => 'Controller@findAccPayslipById',
    'middleware' => [
      'auth:api',
    ],
]);
