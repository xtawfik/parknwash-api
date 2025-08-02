<?php

/**
 * @apiGroup           AccIntangibleAsset
 * @apiName            createAccIntangibleAsset
 *
 * @api                {POST} /v1/acc_intangible_asset Endpoint title here..
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
$router->post('acc_intangible_asset', [
    'as' => 'api_accintangibleasset_create_acc_intangible_asset',
    'uses'  => 'Controller@createAccIntangibleAsset',
    'middleware' => [
      'auth:api',
    ],
]);
