<?php

/**
 * @apiGroup           Partner
 * @apiName            updatePartner
 *
 * @api                {POST} /v1/partner/:id Endpoint title here..
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
$router->post('partner/{id}', [
    'as' => 'api_partner_update_partner',
    'uses'  => 'Controller@updatePartner',
    'middleware' => [
      'auth:api',
    ],
]);
