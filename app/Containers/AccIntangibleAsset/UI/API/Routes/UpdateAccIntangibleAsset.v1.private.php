<?php

/**
 * @apiGroup           AccIntangibleAsset
 * @apiName            updateAccIntangibleAsset
 *
 * @api                {POST} /v1/acc_intangible_asset/:id Endpoint title here..
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
$router->post('acc_intangible_asset/{id}', [
    'as' => 'api_accintangibleasset_update_acc_intangible_asset',
    'uses'  => 'Controller@updateAccIntangibleAsset',
    'middleware' => [
      'auth:api',
    ],
]);
