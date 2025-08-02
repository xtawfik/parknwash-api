<?php

/**
 * @apiGroup           AccPlace
 * @apiName            getAllAccPlaces
 *
 * @api                {GET} /v1/acc_place Endpoint title here..
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
$router->get('acc_place', [
    'as' => 'api_accplace_get_all_acc_places',
    'uses'  => 'Controller@getAllAccPlaces',
    'middleware' => [
      'auth:api',
    ],
]);
