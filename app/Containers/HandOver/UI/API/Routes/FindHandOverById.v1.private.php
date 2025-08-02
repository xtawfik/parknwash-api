<?php

/**
 * @apiGroup           HandOver
 * @apiName            findHandOverById
 *
 * @api                {GET} /v1/hand_over/:id Endpoint title here..
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
$router->get('hand_over/daily', [
  'as' => 'api_handover_find_daily',
  'uses'  => 'Controller@daily',
  'middleware' => [
    'auth:api',
  ],
]);

$router->get('hand_over/{id}', [
    'as' => 'api_handover_find_hand_over_by_id',
    'uses'  => 'Controller@findHandOverById',
    'middleware' => [
      'auth:api',
    ],
]);


