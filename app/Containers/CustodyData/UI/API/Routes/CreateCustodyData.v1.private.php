<?php

/**
 * @apiGroup           CustodyData
 * @apiName            createCustodyData
 *
 * @api                {POST} /v1/custody_data Endpoint title here..
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
$router->post('custody_data', [
    'as' => 'api_custodydata_create_custody_data',
    'uses'  => 'Controller@createCustodyData',
    'middleware' => [
      'auth:api',
    ],
]);
