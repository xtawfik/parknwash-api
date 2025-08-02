<?php

/**
 * @apiGroup           AccBankRule
 * @apiName            deleteAccBankRule
 *
 * @api                {DELETE} /v1/acc_bank_rule/:id Endpoint title here..
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
$router->delete('acc_bank_rule/{id}', [
    'as' => 'api_accbankrule_delete_acc_bank_rule',
    'uses'  => 'Controller@deleteAccBankRule',
    'middleware' => [
      'auth:api',
    ],
]);
