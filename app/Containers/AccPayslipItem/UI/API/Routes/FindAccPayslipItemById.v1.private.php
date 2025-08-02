<?php

/**
 * @apiGroup           AccPayslipItem
 * @apiName            findAccPayslipItemById
 *
 * @api                {GET} /v1/acc_payslip_item/:id Endpoint title here..
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
$router->get('acc_payslip_item/{id}', [
    'as' => 'api_accpayslipitem_find_acc_payslip_item_by_id',
    'uses'  => 'Controller@findAccPayslipItemById',
    'middleware' => [
      'auth:api',
    ],
]);
