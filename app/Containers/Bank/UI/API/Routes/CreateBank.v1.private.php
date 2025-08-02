<?php

/**
 * @apiGroup           Bank
 * @apiName            createBank
 *
 * @api                {POST} /v1/bank Endpoint title here..
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
$router->post('bank', [
    'as' => 'api_bank_create_bank',
    'uses'  => 'Controller@createBank',
    'middleware' => [
      'auth:api',
    ],
]);
