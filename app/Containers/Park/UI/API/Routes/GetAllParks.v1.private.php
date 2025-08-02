<?php

/**
 * @apiGroup           Park
 * @apiName            getAllParks
 *
 * @api                {GET} /v1/park Endpoint title here..
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
$router->get('park', [
    'as' => 'api_park_get_all_parks',
    'uses'  => 'Controller@getAllParks',
    'middleware' => [
      'auth:api',
    ],
]);
