<?php

/**
 * @apiGroup           Nationality
 * @apiName            createNationality
 *
 * @api                {POST} /v1/nationality Endpoint title here..
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
$router->post('nationality', [
    'as' => 'api_nationality_create_nationality',
    'uses'  => 'Controller@createNationality',
    'middleware' => [
      'auth:api',
    ],
]);
