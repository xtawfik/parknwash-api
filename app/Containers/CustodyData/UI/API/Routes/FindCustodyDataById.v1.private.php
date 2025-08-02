<?php

/**
 * @apiGroup           CustodyData
 * @apiName            findCustodyDataById
 *
 * @api                {GET} /v1/custody_data/:id Endpoint title here..
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
$router->get('custody_data/{id}', [
    'as' => 'api_custodydata_find_custody_data_by_id',
    'uses'  => 'Controller@findCustodyDataById',
    'middleware' => [
      'auth:api',
    ],
]);
