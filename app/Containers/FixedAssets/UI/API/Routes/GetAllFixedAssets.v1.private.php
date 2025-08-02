<?php

/**
 * @apiGroup           FixedAssets
 * @apiName            getAllFixedAssets
 *
 * @api                {GET} /v1/fixed_assets Endpoint title here..
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
$router->get('fixed_assets', [
    'as' => 'api_fixedassets_get_all_fixed_assets',
    'uses'  => 'Controller@getAllFixedAssets',
    'middleware' => [
      'auth:api',
    ],
]);
