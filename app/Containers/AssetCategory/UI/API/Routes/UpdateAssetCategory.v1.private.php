<?php

/**
 * @apiGroup           AssetCategory
 * @apiName            updateAssetCategory
 *
 * @api                {POST} /v1/asset_category/:id Endpoint title here..
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
$router->post('asset_category/{id}', [
    'as' => 'api_assetcategory_update_asset_category',
    'uses'  => 'Controller@updateAssetCategory',
    'middleware' => [
      'auth:api',
    ],
]);
