<?php

/**
 * @apiGroup           SalarySheet
 * @apiName            findSalarySheetById
 *
 * @api                {GET} /v1/salary_sheet/:id Endpoint title here..
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
$router->get('salary_sheet/{id}', [
    'as' => 'api_salarysheet_find_salary_sheet_by_id',
    'uses'  => 'Controller@findSalarySheetById',
    'middleware' => [
      'auth:api',
    ],
]);
