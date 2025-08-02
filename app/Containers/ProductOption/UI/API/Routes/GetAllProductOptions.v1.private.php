<?php

/**
 * @apiGroup           ProductOption
 * @apiName            getAllProductOptions
 *
 * @api                {GET} /v1/product_option Endpoint title here..
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
$router->get('product_option', [
    'as' => 'api_productoption_get_all_product_options',
    'uses'  => 'Controller@getAllProductOptions',
    'middleware' => [
      'auth:api',
    ],
]);
