<?php

/**
 * @apiGroup           Expense
 * @apiName            findExpenseById
 *
 * @api                {GET} /v1/expense/:id Endpoint title here..
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
$router->get('expense/{id}', [
    'as' => 'api_expense_find_expense_by_id',
    'uses'  => 'Controller@findExpenseById',
    'middleware' => [
      'auth:api',
    ],
]);
