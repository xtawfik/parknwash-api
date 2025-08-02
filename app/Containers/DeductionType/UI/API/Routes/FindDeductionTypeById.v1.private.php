<?php

/**
 * @apiGroup           DeductionType
 * @apiName            findDeductionTypeById
 *
 * @api                {GET} /v1/deduction_type/:id Endpoint title here..
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
$router->get('deduction_type/{id}', [
    'as' => 'api_deductiontype_find_deduction_type_by_id',
    'uses'  => 'Controller@findDeductionTypeById',
    'middleware' => [
      'auth:api',
    ],
]);
