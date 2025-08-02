<?php

/**
 * @apiGroup           Bank
 * @apiName            getAllBanks
 *
 * @api                {GET} /v1/bank Endpoint title here..
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
$router->get('bank', [
    'as' => 'api_bank_get_all_banks',
    'uses'  => 'Controller@getAllBanks',
    'middleware' => [
      'auth:api',
    ],
]);
