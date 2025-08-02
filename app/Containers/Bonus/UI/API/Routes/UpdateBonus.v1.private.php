<?php

/**
 * @apiGroup           Bonus
 * @apiName            updateBonus
 *
 * @api                {POST} /v1/bonus/:id Endpoint title here..
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
$router->post('bonus/{id}', [
    'as' => 'api_bonus_update_bonus',
    'uses'  => 'Controller@updateBonus',
    'middleware' => [
      'auth:api',
    ],
]);
