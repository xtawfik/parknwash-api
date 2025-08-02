<?php

/**
 * @apiGroup           Nationality
 * @apiName            updateNationality
 *
 * @api                {POST} /v1/nationality/:id Endpoint title here..
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
$router->post('nationality/{id}', [
    'as' => 'api_nationality_update_nationality',
    'uses'  => 'Controller@updateNationality',
    'middleware' => [
      'auth:api',
    ],
]);
