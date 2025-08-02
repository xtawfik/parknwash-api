<?php

/**
 * @apiGroup           AccDivision
 * @apiName            createAccDivision
 *
 * @api                {POST} /v1/acc_division Endpoint title here..
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
$router->post('acc_division', [
    'as' => 'api_accdivision_create_acc_division',
    'uses'  => 'Controller@createAccDivision',
    'middleware' => [
      'auth:api',
    ],
]);
