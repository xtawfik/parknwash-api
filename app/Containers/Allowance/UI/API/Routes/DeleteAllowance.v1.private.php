<?php

/**
 * @apiGroup           Allowance
 * @apiName            deleteAllowance
 *
 * @api                {DELETE} /v1/allowance/:id Endpoint title here..
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
$router->delete('allowance/{id}', [
    'as' => 'api_allowance_delete_allowance',
    'uses'  => 'Controller@deleteAllowance',
    'middleware' => [
      'auth:api',
    ],
]);
