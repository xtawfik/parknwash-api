<?php

/**
 * @apiGroup           Bill
 * @apiName            createBill
 *
 * @api                {POST} /v1/bill Endpoint title here..
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
$router->post('bill', [
    'as' => 'api_bill_create_bill',
    'uses'  => 'Controller@createBill',
    'middleware' => [
      'auth:api',
    ],
]);
