<?php

/**
 * @apiGroup           AccDivision
 * @apiName            updateAccDivision
 *
 * @api                {POST} /v1/acc_division/:id Endpoint title here..
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
$router->post('acc_division/{id}', [
    'as' => 'api_accdivision_update_acc_division',
    'uses'  => 'Controller@updateAccDivision',
    'middleware' => [
      'auth:api',
    ],
]);
