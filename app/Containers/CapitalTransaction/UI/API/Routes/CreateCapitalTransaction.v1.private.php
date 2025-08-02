<?php

/**
 * @apiGroup           CapitalTransaction
 * @apiName            createCapitalTransaction
 *
 * @api                {POST} /v1/capital_transaction Endpoint title here..
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
$router->post('capital_transaction', [
    'as' => 'api_capitaltransaction_create_capital_transaction',
    'uses'  => 'Controller@createCapitalTransaction',
    'middleware' => [
      'auth:api',
    ],
]);
