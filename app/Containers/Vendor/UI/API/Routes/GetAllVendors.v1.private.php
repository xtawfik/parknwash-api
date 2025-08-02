<?php

/**
 * @apiGroup           Vendor
 * @apiName            getAllVendors
 *
 * @api                {GET} /v1/vendor Endpoint title here..
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
$router->get('vendor', [
    'as' => 'api_vendor_get_all_vendors',
    'uses'  => 'Controller@getAllVendors',
    'middleware' => [
      'auth:api',
    ],
]);
