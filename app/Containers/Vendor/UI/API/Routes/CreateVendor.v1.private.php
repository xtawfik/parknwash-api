<?php

/**
 * @apiGroup           Vendor
 * @apiName            createVendor
 *
 * @api                {POST} /v1/vendor Endpoint title here..
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
$router->post('vendor', [
    'as' => 'api_vendor_create_vendor',
    'uses'  => 'Controller@createVendor',
    'middleware' => [
      'auth:api',
    ],
]);
