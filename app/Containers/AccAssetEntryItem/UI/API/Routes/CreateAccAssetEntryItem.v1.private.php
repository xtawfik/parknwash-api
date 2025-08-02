<?php

/**
 * @apiGroup           AccAssetEntryItem
 * @apiName            createAccAssetEntryItem
 *
 * @api                {POST} /v1/acc_asset_entry_item Endpoint title here..
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
$router->post('acc_asset_entry_item', [
    'as' => 'api_accassetentryitem_create_acc_asset_entry_item',
    'uses'  => 'Controller@createAccAssetEntryItem',
    'middleware' => [
      'auth:api',
    ],
]);
