<?php

/**
 * @apiGroup           Receipt
 * @apiName            createReceipt
 *
 * @api                {POST} /v1/receipt Endpoint title here..
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
$router->post('receipt', [
    'as' => 'api_receipt_create_receipt',
    'uses'  => 'Controller@createReceipt',
    'middleware' => [
      'auth:api',
    ],
]);
