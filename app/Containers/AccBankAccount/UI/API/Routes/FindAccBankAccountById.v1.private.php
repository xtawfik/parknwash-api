<?php

/**
 * @apiGroup           AccBankAccount
 * @apiName            findAccBankAccountById
 *
 * @api                {GET} /v1/acc_bank_account/:id Endpoint title here..
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
$router->get('acc_bank_account/{id}', [
    'as' => 'api_accbankaccount_find_acc_bank_account_by_id',
    'uses'  => 'Controller@findAccBankAccountById',
    'middleware' => [
      'auth:api',
    ],
]);
