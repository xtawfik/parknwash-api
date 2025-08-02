<?php

/**
 * @apiGroup           AccForecast
 * @apiName            getAllAccForecasts
 *
 * @api                {GET} /v1/acc_forecast Endpoint title here..
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
$router->get('acc_forecast', [
    'as' => 'api_accforecast_get_all_acc_forecasts',
    'uses'  => 'Controller@getAllAccForecasts',
    'middleware' => [
      'auth:api',
    ],
]);
