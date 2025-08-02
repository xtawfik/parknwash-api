<?php

/**
 * @apiGroup           AccFixedAsset
 * @apiName            updateAccFixedAsset
 *
 * @api                {POST} /v1/acc_fixed_asset/:id Endpoint title here..
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
$router->post('acc_fixed_asset/{id}', [
    'as' => 'api_accfixedasset_update_acc_fixed_asset',
    'uses'  => 'Controller@updateAccFixedAsset',
    'middleware' => [
      'auth:api',
    ],
]);
