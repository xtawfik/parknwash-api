<?php

/**
 * @apiGroup           AccIntangibleAsset
 * @apiName            getAllAccIntangibleAssets
 *
 * @api                {GET} /v1/acc_intangible_asset Endpoint title here..
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
$router->get('acc_intangible_asset', [
    'as' => 'api_accintangibleasset_get_all_acc_intangible_assets',
    'uses'  => 'Controller@getAllAccIntangibleAssets',
    'middleware' => [
      'auth:api',
    ],
]);
