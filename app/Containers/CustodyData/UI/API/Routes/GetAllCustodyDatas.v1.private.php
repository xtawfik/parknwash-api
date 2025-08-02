<?php

/**
 * @apiGroup           CustodyData
 * @apiName            getAllCustodyDatas
 *
 * @api                {GET} /v1/custody_data Endpoint title here..
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
$router->get('custody_data', [
    'as' => 'api_custodydata_get_all_custody_datas',
    'uses'  => 'Controller@getAllCustodyDatas',
    'middleware' => [
      'auth:api',
    ],
]);
