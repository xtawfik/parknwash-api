<?php

/**
 * @apiGroup           Country
 * @apiName            findCountryById
 *
 * @api                {GET} /v1/country/:id Endpoint title here..
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
$router->get('country/{id}', [
    'as' => 'api_country_find_country_by_id',
    'uses'  => 'Controller@findCountryById',
    'middleware' => [
      'auth:api',
    ],
]);
