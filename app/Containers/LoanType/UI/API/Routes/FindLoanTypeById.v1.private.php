<?php

/**
 * @apiGroup           LoanType
 * @apiName            findLoanTypeById
 *
 * @api                {GET} /v1/loan_type/:id Endpoint title here..
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
$router->get('loan_type/{id}', [
    'as' => 'api_loantype_find_loan_type_by_id',
    'uses'  => 'Controller@findLoanTypeById',
    'middleware' => [
      'auth:api',
    ],
]);
