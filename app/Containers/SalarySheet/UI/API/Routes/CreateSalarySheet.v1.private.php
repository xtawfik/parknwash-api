<?php

/**
 * @apiGroup           SalarySheet
 * @apiName            createSalarySheet
 *
 * @api                {POST} /v1/salary_sheet Endpoint title here..
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
$router->post('salary_sheet', [
    'as' => 'api_salarysheet_create_salary_sheet',
    'uses'  => 'Controller@createSalarySheet',
    'middleware' => [
      'auth:api',
    ],
]);
