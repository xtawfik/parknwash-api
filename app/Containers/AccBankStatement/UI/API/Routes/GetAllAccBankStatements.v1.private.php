<?php

/**
 * @apiGroup           AccBankStatement
 * @apiName            getAllAccBankStatements
 *
 * @api                {GET} /v1/acc_bank_statement Endpoint title here..
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
$router->get('acc_bank_statement', [
    'as' => 'api_accbankstatement_get_all_acc_bank_statements',
    'uses'  => 'Controller@getAllAccBankStatements',
    'middleware' => [
      'auth:api',
    ],
]);
