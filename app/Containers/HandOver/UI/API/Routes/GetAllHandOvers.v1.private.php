<?php

/**
 * @apiGroup           HandOver
 * @apiName            getAllHandOvers
 *
 * @api                {GET} /v1/hand_over Endpoint title here..
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
$router->get('hand_over', [
    'as' => 'api_handover_get_all_hand_overs',
    'uses'  => 'Controller@getAllHandOvers',
    'middleware' => [
      'auth:api',
    ],
]);
