<?php

/**
 * @apiGroup           Mall
 * @apiName            createMall
 *
 * @api                {POST} /v1/mall Endpoint title here..
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
$router->post('mall', [
    'as' => 'api_mall_create_mall',
    'uses'  => 'Controller@createMall',
    'middleware' => [
      'auth:api',
    ],
]);
