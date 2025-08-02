<?php

/**
 * @apiGroup           UserCar
 * @apiName            deleteUserCar
 *
 * @api                {DELETE} /v1/user_car/:id Endpoint title here..
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
$router->delete('user_car/{id}', [
    'as' => 'api_usercar_delete_user_car',
    'uses'  => 'Controller@deleteUserCar',
    'middleware' => [
      'auth:api',
    ],
]);
