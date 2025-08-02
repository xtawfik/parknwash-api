<?php

/**
 * @apiGroup           AccAcountTransfer
 * @apiName            deleteAccAcountTransfer
 *
 * @api                {DELETE} /v1/acc_acount_transfer/:id Endpoint title here..
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
$router->delete('acc_acount_transfer/{id}', [
    'as' => 'api_accacounttransfer_delete_acc_acount_transfer',
    'uses'  => 'Controller@deleteAccAcountTransfer',
    'middleware' => [
      'auth:api',
    ],
]);
