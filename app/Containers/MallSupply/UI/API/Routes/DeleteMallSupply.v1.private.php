<?php

/**
 * @apiGroup           MallSupply
 * @apiName            deleteMallSupply
 *
 * @api                {DELETE} /v1/mall_supply/:id Endpoint title here..
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
$router->delete('mall_supply/{id}', [
    'as' => 'api_mallsupply_delete_mall_supply',
    'uses'  => 'Controller@deleteMallSupply',
    'middleware' => [
      'auth:api',
    ],
]);
