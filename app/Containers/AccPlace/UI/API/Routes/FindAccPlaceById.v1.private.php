<?php

/**
 * @apiGroup           AccPlace
 * @apiName            findAccPlaceById
 *
 * @api                {GET} /v1/acc_place/:id Endpoint title here..
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
$router->get('acc_place/{id}', [
    'as' => 'api_accplace_find_acc_place_by_id',
    'uses'  => 'Controller@findAccPlaceById',
    'middleware' => [
      'auth:api',
    ],
]);
