<?php

/**
 * @apiGroup           Supply
 * @apiName            deleteSupply
 *
 * @api                {DELETE} /v1/supply/:id Endpoint title here..
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
$router->delete('supply/{id}', [
    'as' => 'api_supply_delete_supply',
    'uses'  => 'Controller@deleteSupply',
    'middleware' => [
      'auth:api',
    ],
]);
