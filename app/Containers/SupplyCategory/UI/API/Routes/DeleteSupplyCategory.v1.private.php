<?php

/**
 * @apiGroup           SupplyCategory
 * @apiName            deleteSupplyCategory
 *
 * @api                {DELETE} /v1/supply_category/:id Endpoint title here..
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
$router->delete('supply_category/{id}', [
    'as' => 'api_supplycategory_delete_supply_category',
    'uses'  => 'Controller@deleteSupplyCategory',
    'middleware' => [
      'auth:api',
    ],
]);
