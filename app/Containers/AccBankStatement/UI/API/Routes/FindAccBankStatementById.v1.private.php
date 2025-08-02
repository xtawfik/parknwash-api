<?php

/**
 * @apiGroup           AccBankStatement
 * @apiName            findAccBankStatementById
 *
 * @api                {GET} /v1/acc_bank_statement/:id Endpoint title here..
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
$router->get('acc_bank_statement/{id}', [
    'as' => 'api_accbankstatement_find_acc_bank_statement_by_id',
    'uses'  => 'Controller@findAccBankStatementById',
    'middleware' => [
      'auth:api',
    ],
]);
