<?php

/**
 * @apiGroup           Allowance
 * @apiName            createAllowance
 *
 * @api                {POST} /v1/allowance Endpoint title here..
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
$router->post('allowance', [
    'as' => 'api_allowance_create_allowance',
    'uses'  => 'Controller@createAllowance',
    'middleware' => [
      'auth:api',
    ],
]);
