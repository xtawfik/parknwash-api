<?php

/**
 * @apiGroup           Target
 * @apiName            findTargetById
 *
 * @api                {GET} /v1/target/:id Endpoint title here..
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
$router->get('target/calculation', [
    'as' => 'api_target_calculation',
    'uses'  => 'Controller@targetCalculation',
    'middleware' => [
      'auth:api',
    ],
]);

$router->get('target/{id}', [
    'as' => 'api_target_find_target_by_id',
    'uses'  => 'Controller@findTargetById',
    'middleware' => [
      'auth:api',
    ],
]);
