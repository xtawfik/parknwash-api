<?php

/**
 * @apiGroup           AccBankStatement
 * @apiName            createAccBankStatement
 *
 * @api                {POST} /v1/acc_bank_statement Endpoint title here..
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
$router->post('acc_bank_statement', [
    'as' => 'api_accbankstatement_create_acc_bank_statement',
    'uses'  => 'Controller@createAccBankStatement',
    'middleware' => [
      'auth:api',
    ],
]);
