<?php

/**
 * @apiGroup           Bill
 * @apiName            findBillById
 *
 * @api                {GET} /v1/bill/:id Endpoint title here..
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
$router->get('bill/{id}', [
    'as' => 'api_bill_find_bill_by_id',
    'uses'  => 'Controller@findBillById',
    'middleware' => [
      'auth:api',
    ],
]);
