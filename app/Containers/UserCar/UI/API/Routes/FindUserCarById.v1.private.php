<?php

/**
 * @apiGroup           UserCar
 * @apiName            findUserCarById
 *
 * @api                {GET} /v1/user_car/:id Endpoint title here..
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
$router->get('user_car/{id}', [
    'as' => 'api_usercar_find_user_car_by_id',
    'uses'  => 'Controller@findUserCarById',
    'middleware' => [
      'auth:api',
    ],
]);
