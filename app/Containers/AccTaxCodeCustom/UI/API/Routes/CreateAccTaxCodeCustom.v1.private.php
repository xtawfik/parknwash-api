<?php

/**
 * @apiGroup           AccTaxCodeCustom
 * @apiName            createAccTaxCodeCustom
 *
 * @api                {POST} /v1/acc_tax_code_custom Endpoint title here..
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
$router->post('acc_tax_code_custom', [
    'as' => 'api_acctaxcodecustom_create_acc_tax_code_custom',
    'uses'  => 'Controller@createAccTaxCodeCustom',
    'middleware' => [
      'auth:api',
    ],
]);
