<?php

/**
 * @apiGroup           AccDivisionPlace
 * @apiName            createAccDivisionPlace
 *
 * @api                {POST} /v1/acc_division_place Endpoint title here..
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
$router->post('acc_division_place', [
    'as' => 'api_accdivisionplace_create_acc_division_place',
    'uses'  => 'Controller@createAccDivisionPlace',
    'middleware' => [
      'auth:api',
    ],
]);
