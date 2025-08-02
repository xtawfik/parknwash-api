<?php

/**
 * @apiGroup           Receipt
 * @apiName            findReceiptById
 *
 * @api                {GET} /v1/receipt/:id Endpoint title here..
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
$router->get('receipt/{id}', [
    'as' => 'api_receipt_find_receipt_by_id',
    'uses'  => 'Controller@findReceiptById',
    'middleware' => [
      'auth:api',
    ],
]);
