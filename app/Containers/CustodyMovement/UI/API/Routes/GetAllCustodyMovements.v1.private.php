<?php

/**
 * @apiGroup           CustodyMovement
 * @apiName            getAllCustodyMovements
 *
 * @api                {GET} /v1/custody_movement Endpoint title here..
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
$router->get('custody_movement', [
    'as' => 'api_custodymovement_get_all_custody_movements',
    'uses'  => 'Controller@getAllCustodyMovements',
    'middleware' => [
      'auth:api',
    ],
]);
