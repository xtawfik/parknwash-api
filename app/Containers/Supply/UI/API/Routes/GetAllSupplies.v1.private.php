<?php

/**
 * @apiGroup           Supply
 * @apiName            getAllSupplies
 *
 * @api                {GET} /v1/supply Endpoint title here..
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
$router->get('supply', [
    'as' => 'api_supply_get_all_supplies',
    'uses'  => 'Controller@getAllSupplies',
    'middleware' => [
      'auth:api',
    ],
]);
