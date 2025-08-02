<?php

/**
 * @apiGroup           CustodyData
 * @apiName            deleteCustodyData
 *
 * @api                {DELETE} /v1/custody_data/:id Endpoint title here..
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
$router->delete('custody_data/{id}', [
    'as' => 'api_custodydata_delete_custody_data',
    'uses'  => 'Controller@deleteCustodyData',
    'middleware' => [
      'auth:api',
    ],
]);
