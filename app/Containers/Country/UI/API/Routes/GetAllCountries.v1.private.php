<?php

/**
 * @apiGroup           Country
 * @apiName            getAllCountries
 *
 * @api                {GET} /v1/country Endpoint title here..
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
$router->get('country', [
    'as' => 'api_country_get_all_countries',
    'uses'  => 'Controller@getAllCountries',
    'middleware' => [
      'auth:api',
    ],
]);
