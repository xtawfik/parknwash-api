<?php

/**
 * @apiGroup           AccAssetEntryItem
 * @apiName            findAccAssetEntryItemById
 *
 * @api                {GET} /v1/acc_asset_entry_item/:id Endpoint title here..
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
$router->get('acc_asset_entry_item/{id}', [
    'as' => 'api_accassetentryitem_find_acc_asset_entry_item_by_id',
    'uses'  => 'Controller@findAccAssetEntryItemById',
    'middleware' => [
      'auth:api',
    ],
]);
