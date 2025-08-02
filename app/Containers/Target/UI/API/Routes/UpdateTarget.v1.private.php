<?php

/**
 * @apiGroup           Target
 * @apiName            updateTarget
 *
 * @api                {POST} /v1/target/:id Endpoint title here..
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
$router->post('target/{id}', [
    'as' => 'api_target_update_target',
    'uses'  => 'Controller@updateTarget',
    'middleware' => [
      'auth:api',
    ],
]);
