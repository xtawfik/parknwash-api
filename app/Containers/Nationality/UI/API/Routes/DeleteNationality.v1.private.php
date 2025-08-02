<?php

/**
 * @apiGroup           Nationality
 * @apiName            deleteNationality
 *
 * @api                {DELETE} /v1/nationality/:id Endpoint title here..
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
$router->delete('nationality/{id}', [
    'as' => 'api_nationality_delete_nationality',
    'uses'  => 'Controller@deleteNationality',
    'middleware' => [
      'auth:api',
    ],
]);
