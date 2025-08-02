<?php

/**
 * @apiGroup           Custody
 * @apiName            updateCustody
 *
 * @api                {POST} /v1/custody/:id Endpoint title here..
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
$router->post('custody/{id}', [
    'as' => 'api_custody_update_custody',
    'uses'  => 'Controller@updateCustody',
    'middleware' => [
      'auth:api',
    ],
]);
