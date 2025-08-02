<?php

/**
 * @apiGroup           Deduction
 * @apiName            createDeduction
 *
 * @api                {POST} /v1/deduction Endpoint title here..
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
$router->post('deduction', [
    'as' => 'api_deduction_create_deduction',
    'uses'  => 'Controller@createDeduction',
    'middleware' => [
      'auth:api',
    ],
]);
