<?php

/**
 * @apiGroup           Nationality
 * @apiName            getAllNationalities
 *
 * @api                {GET} /v1/nationality Endpoint title here..
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
$router->get('nationality', [
    'as' => 'api_nationality_get_all_nationalities',
    'uses'  => 'Controller@getAllNationalities',
    'middleware' => [
      'auth:api',
    ],
]);
