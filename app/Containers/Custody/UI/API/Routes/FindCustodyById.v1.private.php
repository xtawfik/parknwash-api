<?php

/**
 * @apiGroup           Custody
 * @apiName            findCustodyById
 *
 * @api                {GET} /v1/custody/:id Endpoint title here..
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
$router->get('custody/{id}', [
    'as' => 'api_custody_find_custody_by_id',
    'uses'  => 'Controller@findCustodyById',
    'middleware' => [
      'auth:api',
    ],
]);
