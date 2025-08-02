<?php

/**
 * @apiGroup           Mall
 * @apiName            getAllMalls
 *
 * @api                {GET} /v1/mall Endpoint title here..
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
$router->get('mall', [
    'as' => 'api_mall_get_all_malls',
    'uses'  => 'Controller@getAllMalls',
    'middleware' => [
      'auth:api',
    ],
]);
