<?php

/**
 * @apiGroup           AccAssetEntryItem
 * @apiName            getAllAccAssetEntryItems
 *
 * @api                {GET} /v1/acc_asset_entry_item Endpoint title here..
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
$router->get('acc_asset_entry_item', [
    'as' => 'api_accassetentryitem_get_all_acc_asset_entry_items',
    'uses'  => 'Controller@getAllAccAssetEntryItems',
    'middleware' => [
      'auth:api',
    ],
]);
