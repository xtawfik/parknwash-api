<?php

/**
 * @apiGroup           AccForecast
 * @apiName            createAccForecast
 *
 * @api                {POST} /v1/acc_forecast Endpoint title here..
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
$router->post('acc_forecast', [
    'as' => 'api_accforecast_create_acc_forecast',
    'uses'  => 'Controller@createAccForecast',
    'middleware' => [
      'auth:api',
    ],
]);
