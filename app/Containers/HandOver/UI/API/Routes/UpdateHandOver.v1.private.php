<?php

/**
 * @apiGroup           HandOver
 * @apiName            updateHandOver
 *
 * @api                {POST} /v1/hand_over/:id Endpoint title here..
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
$router->post('hand_over/{id}', [
    'as' => 'api_handover_update_hand_over',
    'uses'  => 'Controller@updateHandOver',
    'middleware' => [
      'auth:api',
    ],
]);
