<?php

/**
 * @apiGroup           AccTaxCodeCustom
 * @apiName            getAllAccTaxCodeCustoms
 *
 * @api                {GET} /v1/acc_tax_code_custom Endpoint title here..
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
$router->get('acc_tax_code_custom', [
    'as' => 'api_acctaxcodecustom_get_all_acc_tax_code_customs',
    'uses'  => 'Controller@getAllAccTaxCodeCustoms',
    'middleware' => [
      'auth:api',
    ],
]);
