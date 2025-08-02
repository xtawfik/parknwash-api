<?php

/**
 * @apiGroup           LoanType
 * @apiName            deleteLoanType
 *
 * @api                {DELETE} /v1/loan_type/:id Endpoint title here..
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
$router->delete('loan_type/{id}', [
    'as' => 'api_loantype_delete_loan_type',
    'uses'  => 'Controller@deleteLoanType',
    'middleware' => [
      'auth:api',
    ],
]);
