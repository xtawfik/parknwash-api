<?php

/**
 * @apiGroup           AccAssetEntry
 * @apiName            createAccAssetEntry
 *
 * @api                {POST} /v1/acc_asset_entry Endpoint title here..
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
$router->post('acc_asset_entry', [
    'as' => 'api_accassetentry_create_acc_asset_entry',
    'uses'  => 'Controller@createAccAssetEntry',
    'middleware' => [
      'auth:api',
    ],
]);
