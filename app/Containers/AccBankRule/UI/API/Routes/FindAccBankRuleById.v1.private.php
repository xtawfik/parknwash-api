<?php

/**
 * @apiGroup           AccBankRule
 * @apiName            findAccBankRuleById
 *
 * @api                {GET} /v1/acc_bank_rule/:id Endpoint title here..
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
$router->get('acc_bank_rule/{id}', [
    'as' => 'api_accbankrule_find_acc_bank_rule_by_id',
    'uses'  => 'Controller@findAccBankRuleById',
    'middleware' => [
      'auth:api',
    ],
]);
