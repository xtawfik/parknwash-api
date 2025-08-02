<?php

/**
 * @apiGroup           AssetCategory
 * @apiName            deleteAssetCategory
 *
 * @api                {DELETE} /v1/asset_category/:id Endpoint title here..
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
$router->delete('asset_category/{id}', [
    'as' => 'api_assetcategory_delete_asset_category',
    'uses'  => 'Controller@deleteAssetCategory',
    'middleware' => [
      'auth:api',
    ],
]);
