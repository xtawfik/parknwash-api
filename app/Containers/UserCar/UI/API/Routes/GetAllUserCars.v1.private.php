<?php

/**
 * @apiGroup           UserCar
 * @apiName            getAllUserCars
 *
 * @api                {GET} /v1/user_car Endpoint title here..
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
$router->get('user_car', [
    'as' => 'api_usercar_get_all_user_cars',
    'uses'  => 'Controller@getAllUserCars',
    'middleware' => [
      'auth:api',
    ],
]);
