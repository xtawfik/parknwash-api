<?php

/**
 * @apiGroup           Country
 * @apiName            deleteCountry
 *
 * @api                {DELETE} /v1/country/:id Endpoint title here..
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
$router->delete('country/{id}', [
    'as' => 'api_country_delete_country',
    'uses'  => 'Controller@deleteCountry',
    'middleware' => [
      'auth:api',
    ],
]);
