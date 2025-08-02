<?php

/**
 * @apiGroup           AccDivisionPlace
 * @apiName            deleteAccDivisionPlace
 *
 * @api                {DELETE} /v1/acc_division_place/:id Endpoint title here..
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
$router->delete('acc_division_place/{id}', [
    'as' => 'api_accdivisionplace_delete_acc_division_place',
    'uses'  => 'Controller@deleteAccDivisionPlace',
    'middleware' => [
      'auth:api',
    ],
]);
