<?php

/**
 * @apiGroup           Receipt
 * @apiName            updateReceipt
 *
 * @api                {POST} /v1/receipt/:id Endpoint title here..
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
$router->post('receipt/{id}', [
    'as' => 'api_receipt_update_receipt',
    'uses'  => 'Controller@updateReceipt',
    'middleware' => [
      'auth:api',
    ],
]);
