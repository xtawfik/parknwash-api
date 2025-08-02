<?php

/**
 * @apiGroup           Custody
 * @apiName            deleteCustody
 *
 * @api                {DELETE} /v1/custody/:id Endpoint title here..
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
$router->delete('custody/{id}', [
    'as' => 'api_custody_delete_custody',
    'uses'  => 'Controller@deleteCustody',
    'middleware' => [
      'auth:api',
    ],
]);
