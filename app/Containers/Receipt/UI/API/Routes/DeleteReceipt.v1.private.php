<?php

/**
 * @apiGroup           Receipt
 * @apiName            deleteReceipt
 *
 * @api                {DELETE} /v1/receipt/:id Endpoint title here..
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
$router->delete('receipt/{id}', [
    'as' => 'api_receipt_delete_receipt',
    'uses'  => 'Controller@deleteReceipt',
    'middleware' => [
      'auth:api',
    ],
]);
