<?php

/**
 * @apiGroup           AccDivisionPlace
 * @apiName            getAllAccDivisionPlaces
 *
 * @api                {GET} /v1/acc_division_place Endpoint title here..
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
$router->get('acc_division_place', [
    'as' => 'api_accdivisionplace_get_all_acc_division_places',
    'uses'  => 'Controller@getAllAccDivisionPlaces',
    'middleware' => [
      'auth:api',
    ],
]);
