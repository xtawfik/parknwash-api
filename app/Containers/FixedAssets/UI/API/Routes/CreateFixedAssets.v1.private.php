<?php

/**
 * @apiGroup           FixedAssets
 * @apiName            createFixedAssets
 *
 * @api                {POST} /v1/fixed_assets Endpoint title here..
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
$router->post('fixed_assets', [
    'as' => 'api_fixedassets_create_fixed_assets',
    'uses'  => 'Controller@createFixedAssets',
    'middleware' => [
      'auth:api',
    ],
]);
