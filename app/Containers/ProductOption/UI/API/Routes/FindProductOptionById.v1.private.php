<?php

/**
 * @apiGroup           ProductOption
 * @apiName            findProductOptionById
 *
 * @api                {GET} /v1/product_option/:id Endpoint title here..
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
$router->get('product_option/{id}', [
    'as' => 'api_productoption_find_product_option_by_id',
    'uses'  => 'Controller@findProductOptionById',
    'middleware' => [
      'auth:api',
    ],
]);
