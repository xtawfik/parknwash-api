<?php

/**
 * @apiGroup           EmployeeDeductionType
 * @apiName            deleteEmployeeDeductionType
 *
 * @api                {DELETE} /v1/employee_deduction_type/:id Endpoint title here..
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
$router->delete('employee_deduction_type/{id}', [
    'as' => 'api_employeedeductiontype_delete_employee_deduction_type',
    'uses'  => 'Controller@deleteEmployeeDeductionType',
    'middleware' => [
      'auth:api',
    ],
]);
