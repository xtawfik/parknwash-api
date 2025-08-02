<?php

/**
 * @apiGroup           Vacation
 * @apiName            updateVacation
 *
 * @api                {POST} /v1/vacation/:id Endpoint title here..
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
$router->post('vacation/{id}', [
    'as' => 'api_vacation_update_vacation',
    'uses'  => 'Controller@updateVacation',
    'middleware' => [
      'auth:api',
    ],
]);
