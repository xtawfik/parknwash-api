<?php

/**
 * @apiGroup           Mall
 * @apiName            deleteMall
 *
 * @api                {DELETE} /v1/mall/:id Endpoint title here..
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
$router->delete('mall/{id}', [
    'as' => 'api_mall_delete_mall',
    'uses'  => 'Controller@deleteMall',
    'middleware' => [
      'auth:api',
    ],
]);
