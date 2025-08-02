<?php

/**
 * @apiGroup           AccReceipt
 * @apiName            deleteAccReceipt
 *
 * @api                {DELETE} /v1/acc_receipt/:id Endpoint title here..
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
$router->delete('acc_receipt/{id}', [
    'as' => 'api_accreceipt_delete_acc_receipt',
    'uses'  => 'Controller@deleteAccReceipt',
    'middleware' => [
      'auth:api',
    ],
]);
