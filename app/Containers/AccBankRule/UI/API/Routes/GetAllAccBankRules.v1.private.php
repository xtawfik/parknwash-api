<?php

/**
 * @apiGroup           AccBankRule
 * @apiName            getAllAccBankRules
 *
 * @api                {GET} /v1/acc_bank_rule Endpoint title here..
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
$router->get('acc_bank_rule', [
    'as' => 'api_accbankrule_get_all_acc_bank_rules',
    'uses'  => 'Controller@getAllAccBankRules',
    'middleware' => [
      'auth:api',
    ],
]);
