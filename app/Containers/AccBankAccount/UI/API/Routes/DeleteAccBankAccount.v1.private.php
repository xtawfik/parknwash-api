<?php

/**
 * @apiGroup           AccBankAccount
 * @apiName            deleteAccBankAccount
 *
 * @api                {DELETE} /v1/acc_bank_account/:id Endpoint title here..
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
$router->delete('acc_bank_account/{id}', [
    'as' => 'api_accbankaccount_delete_acc_bank_account',
    'uses'  => 'Controller@deleteAccBankAccount',
    'middleware' => [
      'auth:api',
    ],
]);
