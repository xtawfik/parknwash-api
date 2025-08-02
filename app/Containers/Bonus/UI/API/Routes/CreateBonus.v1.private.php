<?php

/**
 * @apiGroup           Bonus
 * @apiName            createBonus
 *
 * @api                {POST} /v1/bonus Endpoint title here..
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
$router->post('bonus', [
    'as' => 'api_bonus_create_bonus',
    'uses'  => 'Controller@createBonus',
    'middleware' => [
      'auth:api',
    ],
]);
