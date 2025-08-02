<?php

/**
 * @apiGroup           AccTaxCode
 * @apiName            getAllAccTaxCodes
 *
 * @api                {GET} /v1/acc_tax_code Endpoint title here..
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
$router->get('acc_tax_code', [
    'as' => 'api_acctaxcode_get_all_acc_tax_codes',
    'uses'  => 'Controller@getAllAccTaxCodes',
    'middleware' => [
      'auth:api',
    ],
]);
