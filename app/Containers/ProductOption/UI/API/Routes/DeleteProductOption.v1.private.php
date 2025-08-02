<?php

/**
 * @apiGroup           ProductOption
 * @apiName            deleteProductOption
 *
 * @api                {DELETE} /v1/product_option/:id Endpoint title here..
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
$router->delete('product_option/{id}', [
    'as' => 'api_productoption_delete_product_option',
    'uses'  => 'Controller@deleteProductOption',
    'middleware' => [
      'auth:api',
    ],
]);
