<?php

/**
 * @apiGroup           MallStock
 * @apiName            updateMallStock
 *
 * @api                {POST} /v1/mall_stock/:id Endpoint title here..
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
$router->post('mall_stock/{id}', [
    'as' => 'api_mallstock_update_mall_stock',
    'uses'  => 'Controller@updateMallStock',
    'middleware' => [
      'auth:api',
    ],
]);
