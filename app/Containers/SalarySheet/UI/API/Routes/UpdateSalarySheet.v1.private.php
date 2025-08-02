<?php

/**
 * @apiGroup           SalarySheet
 * @apiName            updateSalarySheet
 *
 * @api                {POST} /v1/salary_sheet/:id Endpoint title here..
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
$router->post('salary_sheet/{id}', [
    'as' => 'api_salarysheet_update_salary_sheet',
    'uses'  => 'Controller@updateSalarySheet',
    'middleware' => [
      'auth:api',
    ],
]);
