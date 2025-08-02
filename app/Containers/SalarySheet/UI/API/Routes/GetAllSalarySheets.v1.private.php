<?php

/**
 * @apiGroup           SalarySheet
 * @apiName            getAllSalarySheets
 *
 * @api                {GET} /v1/salary_sheet Endpoint title here..
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
$router->get('salary_sheet', [
    'as' => 'api_salarysheet_get_all_salary_sheets',
    'uses'  => 'Controller@getAllSalarySheets',
    'middleware' => [
      'auth:api',
    ],
]);

$router->get('check_salary_sheet', [
    'as' => 'api_salarysheet_get_all_salary_sheets',
    'uses'  => 'Controller@checkAllSalarySheets',
    'middleware' => [
//      'auth:api',
    ],
]);
