<?php

/**
 * @apiGroup           DamageRequest
 * @apiName            updateDamageRequest
 *
 * @api                {POST} /v1/damage_request/:id Endpoint title here..
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
$router->post('damage_request/{id}', [
    'as' => 'api_damagerequest_update_damage_request',
    'uses'  => 'Controller@updateDamageRequest',
    'middleware' => [
      'auth:api',
    ],
]);
