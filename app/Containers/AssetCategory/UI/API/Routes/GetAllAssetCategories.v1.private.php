<?php

/**
 * @apiGroup           AssetCategory
 * @apiName            getAllAssetCategories
 *
 * @api                {GET} /v1/asset_category Endpoint title here..
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
$router->get('asset_category', [
    'as' => 'api_assetcategory_get_all_asset_categories',
    'uses'  => 'Controller@getAllAssetCategories',
    'middleware' => [
      'auth:api',
    ],
]);
