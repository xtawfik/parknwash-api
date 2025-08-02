<?php

/**
 * @apiGroup           Bill
 * @apiName            deleteBill
 *
 * @api                {DELETE} /v1/bill/:id Endpoint title here..
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
$router->delete('bill/{id}', [
    'as' => 'api_bill_delete_bill',
    'uses'  => 'Controller@deleteBill',
    'middleware' => [
      'auth:api',
    ],
]);
