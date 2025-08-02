<?php

/**
 * @apiGroup           Supply
 * @apiName            updateSupply
 *
 * @api                {POST} /v1/supply/:id Endpoint title here..
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
$router->post('supply/{id}', [
    'as' => 'api_supply_update_supply',
    'uses'  => 'Controller@updateSupply',
    'middleware' => [
      'auth:api',
    ],
]);
