<?php

/**
 * @apiGroup           SalarySheet
 * @apiName            deleteSalarySheet
 *
 * @api                {DELETE} /v1/salary_sheet/:id Endpoint title here..
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
$router->delete('salary_sheet/{id}', [
    'as' => 'api_salarysheet_delete_salary_sheet',
    'uses'  => 'Controller@deleteSalarySheet',
    'middleware' => [
      'auth:api',
    ],
]);
