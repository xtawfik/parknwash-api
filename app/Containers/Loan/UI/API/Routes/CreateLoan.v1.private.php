<?php

/**
 * @apiGroup           Loan
 * @apiName            createLoan
 *
 * @api                {POST} /v1/loan Endpoint title here..
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
$router->post('loan', [
    'as' => 'api_loan_create_loan',
    'uses'  => 'Controller@createLoan',
    'middleware' => [
      'auth:api',
    ],
]);
