<?php

/**
 * @apiGroup           Deduction
 * @apiName            updateDeduction
 *
 * @api                {POST} /v1/deduction/:id Endpoint title here..
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
$router->post('deduction/{id}', [
    'as' => 'api_deduction_update_deduction',
    'uses'  => 'Controller@updateDeduction',
    'middleware' => [
      'auth:api',
    ],
]);
