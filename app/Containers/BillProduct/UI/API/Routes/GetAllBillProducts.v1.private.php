<?php

/**
 * @apiGroup           BillProduct
 * @apiName            getAllBillProducts
 *
 * @api                {GET} /v1/bill_product Endpoint title here..
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
$router->get('bill_product', [
    'as' => 'api_billproduct_get_all_bill_products',
    'uses'  => 'Controller@getAllBillProducts',
    'middleware' => [
      'auth:api',
    ],
]);
