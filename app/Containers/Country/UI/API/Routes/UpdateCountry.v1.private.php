<?php

/**
 * @apiGroup           Country
 * @apiName            updateCountry
 *
 * @api                {POST} /v1/country/:id Endpoint title here..
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
$router->post('country/{id}', [
    'as' => 'api_country_update_country',
    'uses'  => 'Controller@updateCountry',
    'middleware' => [
      'auth:api',
    ],
]);
