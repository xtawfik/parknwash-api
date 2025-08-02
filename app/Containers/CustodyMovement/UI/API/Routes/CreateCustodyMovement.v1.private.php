<?php

/**
 * @apiGroup           CustodyMovement
 * @apiName            createCustodyMovement
 *
 * @api                {POST} /v1/custody_movement Endpoint title here..
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
$router->post('custody_movement', [
    'as' => 'api_custodymovement_create_custody_movement',
    'uses'  => 'Controller@createCustodyMovement',
    'middleware' => [
      'auth:api',
    ],
]);
