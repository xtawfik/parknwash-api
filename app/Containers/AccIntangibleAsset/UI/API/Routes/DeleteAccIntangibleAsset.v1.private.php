<?php

/**
 * @apiGroup           AccIntangibleAsset
 * @apiName            deleteAccIntangibleAsset
 *
 * @api                {DELETE} /v1/acc_intangible_asset/:id Endpoint title here..
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
$router->delete('acc_intangible_asset/{id}', [
    'as' => 'api_accintangibleasset_delete_acc_intangible_asset',
    'uses'  => 'Controller@deleteAccIntangibleAsset',
    'middleware' => [
      'auth:api',
    ],
]);
