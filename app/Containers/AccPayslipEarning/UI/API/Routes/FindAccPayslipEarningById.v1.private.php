<?php

/**
 * @apiGroup           AccPayslipEarning
 * @apiName            findAccPayslipEarningById
 *
 * @api                {GET} /v1/acc_payslip_earning/:id Endpoint title here..
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
$router->get('acc_payslip_earning/{id}', [
    'as' => 'api_accpayslipearning_find_acc_payslip_earning_by_id',
    'uses'  => 'Controller@findAccPayslipEarningById',
    'middleware' => [
      'auth:api',
    ],
]);
