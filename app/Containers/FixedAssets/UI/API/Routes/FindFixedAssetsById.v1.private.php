<?php

/**
 * @apiGroup           FixedAssets
 * @apiName            findFixedAssetsById
 *
 * @api                {GET} /v1/fixed_assets/:id Endpoint title here..
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
$router->get('fixed_assets/{id}', [
    'as' => 'api_fixedassets_find_fixed_assets_by_id',
    'uses'  => 'Controller@findFixedAssetsById',
    'middleware' => [
      'auth:api',
    ],
]);
