<?php

/**
 * @apiGroup           Partner
 * @apiName            deletePartner
 *
 * @api                {DELETE} /v1/partner/:id Endpoint title here..
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
$router->delete('partner/{id}', [
    'as' => 'api_partner_delete_partner',
    'uses'  => 'Controller@deletePartner',
    'middleware' => [
      'auth:api',
    ],
]);
