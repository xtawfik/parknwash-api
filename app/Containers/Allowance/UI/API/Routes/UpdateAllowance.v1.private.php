<?php

/**
 * @apiGroup           Allowance
 * @apiName            updateAllowance
 *
 * @api                {POST} /v1/allowance/:id Endpoint title here..
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
$router->post('allowance/{id}', [
    'as' => 'api_allowance_update_allowance',
    'uses'  => 'Controller@updateAllowance',
    'middleware' => [
      'auth:api',
    ],
]);
