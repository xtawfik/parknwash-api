<?php

/**
 * @apiGroup           MallSupply
 * @apiName            createMallSupply
 *
 * @api                {POST} /v1/mall_supply Endpoint title here..
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
$router->post('mall_supply', [
    'as' => 'api_mallsupply_create_mall_supply',
    'uses'  => 'Controller@createMallSupply',
    'middleware' => [
      'auth:api',
    ],
]);
