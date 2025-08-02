<?php

/**
 * @apiGroup           Target
 * @apiName            deleteTarget
 *
 * @api                {DELETE} /v1/target/:id Endpoint title here..
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
$router->delete('target/{id}', [
    'as' => 'api_target_delete_target',
    'uses'  => 'Controller@deleteTarget',
    'middleware' => [
      'auth:api',
    ],
]);
