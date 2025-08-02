<?php

/**
 * @apiGroup           AccTaxCodeCustom
 * @apiName            deleteAccTaxCodeCustom
 *
 * @api                {DELETE} /v1/acc_tax_code_custom/:id Endpoint title here..
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
$router->delete('acc_tax_code_custom/{id}', [
    'as' => 'api_acctaxcodecustom_delete_acc_tax_code_custom',
    'uses'  => 'Controller@deleteAccTaxCodeCustom',
    'middleware' => [
      'auth:api',
    ],
]);
