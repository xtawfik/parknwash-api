<?php

/**
 * @apiGroup           Allowance
 * @apiName            findAllowanceById
 *
 * @api                {GET} /v1/allowance/:id Endpoint title here..
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
$router->get('allowance/{id}', [
    'as' => 'api_allowance_find_allowance_by_id',
    'uses'  => 'Controller@findAllowanceById',
    'middleware' => [
      'auth:api',
    ],
]);
