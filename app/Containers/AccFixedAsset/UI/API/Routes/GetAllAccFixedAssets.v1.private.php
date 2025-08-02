<?php

/**
 * @apiGroup           AccFixedAsset
 * @apiName            getAllAccFixedAssets
 *
 * @api                {GET} /v1/acc_fixed_asset Endpoint title here..
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
$router->get('acc_fixed_asset', [
    'as' => 'api_accfixedasset_get_all_acc_fixed_assets',
    'uses'  => 'Controller@getAllAccFixedAssets',
    'middleware' => [
      'auth:api',
    ],
]);
