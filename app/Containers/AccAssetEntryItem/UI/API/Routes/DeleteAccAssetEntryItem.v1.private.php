<?php

/**
 * @apiGroup           AccAssetEntryItem
 * @apiName            deleteAccAssetEntryItem
 *
 * @api                {DELETE} /v1/acc_asset_entry_item/:id Endpoint title here..
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
$router->delete('acc_asset_entry_item/{id}', [
    'as' => 'api_accassetentryitem_delete_acc_asset_entry_item',
    'uses'  => 'Controller@deleteAccAssetEntryItem',
    'middleware' => [
      'auth:api',
    ],
]);
