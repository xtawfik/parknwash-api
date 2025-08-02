<?php

/**
 * @apiGroup           AccTaxCode
 * @apiName            findAccTaxCodeById
 *
 * @api                {GET} /v1/acc_tax_code/:id Endpoint title here..
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
$router->get('acc_tax_code/{id}', [
    'as' => 'api_acctaxcode_find_acc_tax_code_by_id',
    'uses'  => 'Controller@findAccTaxCodeById',
    'middleware' => [
      'auth:api',
    ],
]);
