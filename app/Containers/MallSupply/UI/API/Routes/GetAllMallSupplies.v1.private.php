<?php

/**
 * @apiGroup           MallSupply
 * @apiName            getAllMallSupplies
 *
 * @api                {GET} /v1/mall_supply Endpoint title here..
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
$router->get('mall_supply', [
    'as' => 'api_mallsupply_get_all_mall_supplies',
    'uses'  => 'Controller@getAllMallSupplies',
    'middleware' => [
      'auth:api',
    ],
]);
