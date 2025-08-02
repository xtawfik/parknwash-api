<?php

/**
 * @apiGroup           AccTaxCode
 * @apiName            createAccTaxCode
 *
 * @api                {POST} /v1/acc_tax_code Endpoint title here..
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
$router->post('acc_tax_code', [
    'as' => 'api_acctaxcode_create_acc_tax_code',
    'uses'  => 'Controller@createAccTaxCode',
    'middleware' => [
      'auth:api',
    ],
]);
