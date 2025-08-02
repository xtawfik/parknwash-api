<?php

/**
 * @apiGroup           LoanType
 * @apiName            createLoanType
 *
 * @api                {POST} /v1/loan_type Endpoint title here..
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
$router->post('loan_type', [
    'as' => 'api_loantype_create_loan_type',
    'uses'  => 'Controller@createLoanType',
    'middleware' => [
      'auth:api',
    ],
]);
