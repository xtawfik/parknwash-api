<?php

/**
 * @apiGroup           SupplyCategory
 * @apiName            getAllSupplyCategories
 *
 * @api                {GET} /v1/supply_category Endpoint title here..
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
$router->get('supply_category', [
    'as' => 'api_supplycategory_get_all_supply_categories',
    'uses'  => 'Controller@getAllSupplyCategories',
    'middleware' => [
      'auth:api',
    ],
]);
