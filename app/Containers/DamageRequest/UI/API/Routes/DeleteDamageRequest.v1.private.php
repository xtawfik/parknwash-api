<?php

/**
 * @apiGroup           DamageRequest
 * @apiName            deleteDamageRequest
 *
 * @api                {DELETE} /v1/damage_request/:id Endpoint title here..
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
$router->delete('damage_request/{id}', [
    'as' => 'api_damagerequest_delete_damage_request',
    'uses'  => 'Controller@deleteDamageRequest',
    'middleware' => [
      'auth:api',
    ],
]);
