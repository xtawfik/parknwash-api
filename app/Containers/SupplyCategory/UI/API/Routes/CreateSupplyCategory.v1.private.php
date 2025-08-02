<?php

/**
 * @apiGroup           SupplyCategory
 * @apiName            createSupplyCategory
 *
 * @api                {POST} /v1/supply_category Endpoint title here..
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
$router->post('supply_category', [
    'as' => 'api_supplycategory_create_supply_category',
    'uses'  => 'Controller@createSupplyCategory',
    'middleware' => [
      'auth:api',
    ],
]);
