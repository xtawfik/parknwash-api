<?php

/**
 * @apiGroup           AccBankRule
 * @apiName            updateAccBankRule
 *
 * @api                {POST} /v1/acc_bank_rule/:id Endpoint title here..
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
$router->post('acc_bank_rule/{id}', [
    'as' => 'api_accbankrule_update_acc_bank_rule',
    'uses'  => 'Controller@updateAccBankRule',
    'middleware' => [
      'auth:api',
    ],
]);
