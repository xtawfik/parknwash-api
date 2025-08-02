<?php

/**
 * @apiGroup           BillProduct
 * @apiName            findBillProductById
 *
 * @api                {GET} /v1/bill_product/:id Endpoint title here..
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
$router->get('bill_product/{id}', [
    'as' => 'api_billproduct_find_bill_product_by_id',
    'uses'  => 'Controller@findBillProductById',
    'middleware' => [
      'auth:api',
    ],
]);
