<?php

/**
 * @apiGroup           EmployeeDeductionType
 * @apiName            findEmployeeDeductionTypeById
 *
 * @api                {GET} /v1/employee_deduction_type/:id Endpoint title here..
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
$router->get('employee_deduction_type/{id}', [
    'as' => 'api_employeedeductiontype_find_employee_deduction_type_by_id',
    'uses'  => 'Controller@findEmployeeDeductionTypeById',
    'middleware' => [
      'auth:api',
    ],
]);
