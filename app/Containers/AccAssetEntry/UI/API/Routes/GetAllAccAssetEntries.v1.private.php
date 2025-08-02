<?php

/**
 * @apiGroup           AccAssetEntry
 * @apiName            getAllAccAssetEntries
 *
 * @api                {GET} /v1/acc_asset_entry Endpoint title here..
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
$router->get('acc_asset_entry', [
    'as' => 'api_accassetentry_get_all_acc_asset_entries',
    'uses'  => 'Controller@getAllAccAssetEntries',
    'middleware' => [
      'auth:api',
    ],
]);
