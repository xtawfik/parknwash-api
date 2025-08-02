<?php

/**
 * @apiGroup           Damaged
 * @apiName            getAllDamageds
 *
 * @api                {GET} /v1/damaged Endpoint title here..
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
$router->get('damaged', [
    'as' => 'api_damaged_get_all_damageds',
    'uses'  => 'Controller@getAllDamageds',
    'middleware' => [
      'auth:api',
    ],
]);
