<?php

/**
 * @apiGroup           EmployeeDeductionType
 * @apiName            createEmployeeDeductionType
 *
 * @api                {POST} /v1/employee_deduction_type Endpoint title here..
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
$router->post('employee_deduction_type', [
    'as' => 'api_employeedeductiontype_create_employee_deduction_type',
    'uses'  => 'Controller@createEmployeeDeductionType',
    'middleware' => [
      'auth:api',
    ],
]);
