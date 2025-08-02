<?php

/**
 * @apiGroup           EmployeeDeductionType
 * @apiName            getAllEmployeeDeductionTypes
 *
 * @api                {GET} /v1/employee_deduction_type Endpoint title here..
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
$router->get('employee_deduction_type', [
    'as' => 'api_employeedeductiontype_get_all_employee_deduction_types',
    'uses'  => 'Controller@getAllEmployeeDeductionTypes',
    'middleware' => [
      'auth:api',
    ],
]);
