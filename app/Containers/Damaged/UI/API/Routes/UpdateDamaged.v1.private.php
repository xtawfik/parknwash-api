<?php

/**
 * @apiGroup           Damaged
 * @apiName            updateDamaged
 *
 * @api                {POST} /v1/damaged/:id Endpoint title here..
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
$router->post('damaged/{id}', [
    'as' => 'api_damaged_update_damaged',
    'uses'  => 'Controller@updateDamaged',
    'middleware' => [
      'auth:api',
    ],
]);
