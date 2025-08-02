<?php

/**
 * @apiGroup           Bonus
 * @apiName            deleteBonus
 *
 * @api                {DELETE} /v1/bonus/:id Endpoint title here..
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
$router->delete('bonus/{id}', [
    'as' => 'api_bonus_delete_bonus',
    'uses'  => 'Controller@deleteBonus',
    'middleware' => [
      'auth:api',
    ],
]);
