<?php

/**
 * @apiGroup           Expense
 * @apiName            updateExpense
 *
 * @api                {POST} /v1/expense/:id Endpoint title here..
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
$router->post('expense/{id}', [
    'as' => 'api_expense_update_expense',
    'uses'  => 'Controller@updateExpense',
    'middleware' => [
      'auth:api',
    ],
]);
