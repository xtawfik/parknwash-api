<?php

/**
 * @apiGroup           AccFixedAsset
 * @apiName            createAccFixedAsset
 *
 * @api                {POST} /v1/acc_fixed_asset Endpoint title here..
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
$router->post('acc_fixed_asset', [
    'as' => 'api_accfixedasset_create_acc_fixed_asset',
    'uses'  => 'Controller@createAccFixedAsset',
    'middleware' => [
      'auth:api',
    ],
]);
