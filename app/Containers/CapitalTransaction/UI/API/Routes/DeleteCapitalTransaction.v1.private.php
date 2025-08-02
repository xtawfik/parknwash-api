<?php

/**
 * @apiGroup           CapitalTransaction
 * @apiName            deleteCapitalTransaction
 *
 * @api                {DELETE} /v1/capital_transaction/:id Endpoint title here..
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
$router->delete('capital_transaction/{id}', [
    'as' => 'api_capitaltransaction_delete_capital_transaction',
    'uses'  => 'Controller@deleteCapitalTransaction',
    'middleware' => [
      'auth:api',
    ],
]);
