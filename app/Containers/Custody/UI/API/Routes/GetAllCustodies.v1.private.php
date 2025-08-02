<?php

/**
 * @apiGroup           Custody
 * @apiName            getAllCustodies
 *
 * @api                {GET} /v1/custody Endpoint title here..
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
$router->get('custody', [
    'as' => 'api_custody_get_all_custodies',
    'uses'  => 'Controller@getAllCustodies',
    'middleware' => [
      'auth:api',
    ],
]);
