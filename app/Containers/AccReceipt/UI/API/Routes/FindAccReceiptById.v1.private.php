<?php

/**
 * @apiGroup           AccReceipt
 * @apiName            findAccReceiptById
 *
 * @api                {GET} /v1/acc_receipt/:id Endpoint title here..
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
$router->get('acc_receipt/{id}', [
    'as' => 'api_accreceipt_find_acc_receipt_by_id',
    'uses'  => 'Controller@findAccReceiptById',
    'middleware' => [
      'auth:api',
    ],
]);
