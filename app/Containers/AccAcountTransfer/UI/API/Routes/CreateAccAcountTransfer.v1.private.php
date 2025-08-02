<?php

/**
 * @apiGroup           AccAcountTransfer
 * @apiName            createAccAcountTransfer
 *
 * @api                {POST} /v1/acc_acount_transfer Endpoint title here..
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
$router->post('acc_acount_transfer', [
    'as' => 'api_accacounttransfer_create_acc_acount_transfer',
    'uses'  => 'Controller@createAccAcountTransfer',
    'middleware' => [
      'auth:api',
    ],
]);
