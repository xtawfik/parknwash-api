<?php

/**
 * @apiGroup           Loan
 * @apiName            deleteLoan
 *
 * @api                {DELETE} /v1/loan/:id Endpoint title here..
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
$router->delete('loan/{id}', [
    'as' => 'api_loan_delete_loan',
    'uses'  => 'Controller@deleteLoan',
    'middleware' => [
      'auth:api',
    ],
]);
