<?php

/**
 * @apiGroup           AccDivision
 * @apiName            findAccDivisionById
 *
 * @api                {GET} /v1/acc_division/:id Endpoint title here..
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
$router->get('acc_division/{id}', [
    'as' => 'api_accdivision_find_acc_division_by_id',
    'uses'  => 'Controller@findAccDivisionById',
    'middleware' => [
      'auth:api',
    ],
]);
