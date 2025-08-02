<?php

/**
 * @apiGroup           UserCar
 * @apiName            updateUserCar
 *
 * @api                {POST} /v1/user_car/:id Endpoint title here..
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
$router->post('user_car/{id}', [
    'as' => 'api_usercar_update_user_car',
    'uses'  => 'Controller@updateUserCar',
    'middleware' => [
      'auth:api',
    ],
]);
