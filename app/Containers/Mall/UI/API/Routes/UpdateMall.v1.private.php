<?php

/**
 * @apiGroup           Mall
 * @apiName            updateMall
 *
 * @api                {POST} /v1/mall/:id Endpoint title here..
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
$router->post('mall/{id}', [
    'as' => 'api_mall_update_mall',
    'uses'  => 'Controller@updateMall',
    'middleware' => [
      'auth:api',
    ],
]);
