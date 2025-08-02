<?php

/**
 * @apiGroup           AccAcountTransfer
 * @apiName            getAllAccAcountTransfers
 *
 * @api                {GET} /v1/acc_acount_transfer Endpoint title here..
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
$router->get('acc_acount_transfer', [
    'as' => 'api_accacounttransfer_get_all_acc_acount_transfers',
    'uses'  => 'Controller@getAllAccAcountTransfers',
    'middleware' => [
      'auth:api',
    ],
]);
