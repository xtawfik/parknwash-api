<?php

/**
 * @apiGroup           ProductOption
 * @apiName            createProductOption
 *
 * @api                {POST} /v1/product_option Endpoint title here..
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
$router->post('product_option', [
    'as' => 'api_productoption_create_product_option',
    'uses'  => 'Controller@createProductOption',
    'middleware' => [
      'auth:api',
    ],
]);
