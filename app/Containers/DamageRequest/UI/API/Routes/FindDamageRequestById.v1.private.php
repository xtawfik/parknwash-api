<?php

/**
 * @apiGroup           DamageRequest
 * @apiName            findDamageRequestById
 *
 * @api                {GET} /v1/damage_request/:id Endpoint title here..
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
$router->get('damage_request/{id}', [
    'as' => 'api_damagerequest_find_damage_request_by_id',
    'uses'  => 'Controller@findDamageRequestById',
    'middleware' => [
      'auth:api',
    ],
]);
