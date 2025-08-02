<?php

/**
 * @apiGroup           Deduction
 * @apiName            findDeductionById
 *
 * @api                {GET} /v1/deduction/:id Endpoint title here..
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
$router->get('deduction/{id}', [
    'as' => 'api_deduction_find_deduction_by_id',
    'uses'  => 'Controller@findDeductionById',
    'middleware' => [
      'auth:api',
    ],
]);
