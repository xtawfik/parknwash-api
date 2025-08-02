<?php

/**
 * @apiGroup           AccBankStatement
 * @apiName            deleteAccBankStatement
 *
 * @api                {DELETE} /v1/acc_bank_statement/:id Endpoint title here..
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
$router->delete('acc_bank_statement/{id}', [
    'as' => 'api_accbankstatement_delete_acc_bank_statement',
    'uses'  => 'Controller@deleteAccBankStatement',
    'middleware' => [
      'auth:api',
    ],
]);
