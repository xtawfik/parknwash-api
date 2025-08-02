<?php

/**
 * @apiGroup           Receipt
 * @apiName            getAllReceipts
 *
 * @api                {GET} /v1/receipt Endpoint title here..
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
$router->get('receipt', [
    'as' => 'api_receipt_get_all_receipts',
    'uses'  => 'Controller@getAllReceipts',
    'middleware' => [
      'auth:api',
    ],
]);
