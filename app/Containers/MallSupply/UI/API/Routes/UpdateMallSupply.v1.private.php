<?php

/**
 * @apiGroup           MallSupply
 * @apiName            updateMallSupply
 *
 * @api                {POST} /v1/mall_supply/:id Endpoint title here..
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
$router->post('mall_supply/{id}', [
    'as' => 'api_mallsupply_update_mall_supply',
    'uses'  => 'Controller@updateMallSupply',
    'middleware' => [
      'auth:api',
    ],
]);
