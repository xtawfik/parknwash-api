<?php

/**
 * @apiGroup           HandOver
 * @apiName            createHandOver
 *
 * @api                {POST} /v1/hand_over Endpoint title here..
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
$router->post('hand_over', [
    'as' => 'api_handover_create_hand_over',
    'uses'  => 'Controller@createHandOver',
    'middleware' => [
      'auth:api',
    ],
]);
