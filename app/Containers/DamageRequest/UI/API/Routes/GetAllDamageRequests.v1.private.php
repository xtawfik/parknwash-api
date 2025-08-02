<?php

/**
 * @apiGroup           DamageRequest
 * @apiName            getAllDamageRequests
 *
 * @api                {GET} /v1/damage_request Endpoint title here..
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
$router->get('damage_request', [
    'as' => 'api_damagerequest_get_all_damage_requests',
    'uses'  => 'Controller@getAllDamageRequests',
    'middleware' => [
      'auth:api',
    ],
]);
