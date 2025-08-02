<?php

/**
 * @apiGroup           Supply
 * @apiName            findSupplyById
 *
 * @api                {GET} /v1/supply/:id Endpoint title here..
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
$router->get('supply/{id}', [
    'as' => 'api_supply_find_supply_by_id',
    'uses'  => 'Controller@findSupplyById',
    'middleware' => [
      'auth:api',
    ],
]);
