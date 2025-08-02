<?php

/**
 * @apiGroup           AccFixedAsset
 * @apiName            findAccFixedAssetById
 *
 * @api                {GET} /v1/acc_fixed_asset/:id Endpoint title here..
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
$router->get('acc_fixed_asset/{id}', [
    'as' => 'api_accfixedasset_find_acc_fixed_asset_by_id',
    'uses'  => 'Controller@findAccFixedAssetById',
    'middleware' => [
      'auth:api',
    ],
]);
