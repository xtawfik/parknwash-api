<?php

/**
 * @apiGroup           AccDivision
 * @apiName            deleteAccDivision
 *
 * @api                {DELETE} /v1/acc_division/:id Endpoint title here..
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
$router->delete('acc_division/{id}', [
    'as' => 'api_accdivision_delete_acc_division',
    'uses'  => 'Controller@deleteAccDivision',
    'middleware' => [
      'auth:api',
    ],
]);
