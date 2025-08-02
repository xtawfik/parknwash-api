<?php

/**
 * @apiGroup           Supply
 * @apiName            createSupply
 *
 * @api                {POST} /v1/supply Endpoint title here..
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
$router->post('supply', [
    'as' => 'api_supply_create_supply',
    'uses'  => 'Controller@createSupply',
    'middleware' => [
      'auth:api',
    ],
]);
