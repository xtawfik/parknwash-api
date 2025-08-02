<?php

/**
 * @apiGroup           Deduction
 * @apiName            getAllDeductions
 *
 * @api                {GET} /v1/deduction Endpoint title here..
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
$router->get('deduction', [
    'as' => 'api_deduction_get_all_deductions',
    'uses'  => 'Controller@getAllDeductions',
    'middleware' => [
      'auth:api',
    ],
]);
