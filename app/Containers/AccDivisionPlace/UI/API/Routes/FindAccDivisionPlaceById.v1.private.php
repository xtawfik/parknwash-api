<?php

/**
 * @apiGroup           AccDivisionPlace
 * @apiName            findAccDivisionPlaceById
 *
 * @api                {GET} /v1/acc_division_place/:id Endpoint title here..
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
$router->get('acc_division_place/{id}', [
    'as' => 'api_accdivisionplace_find_acc_division_place_by_id',
    'uses'  => 'Controller@findAccDivisionPlaceById',
    'middleware' => [
      'auth:api',
    ],
]);
