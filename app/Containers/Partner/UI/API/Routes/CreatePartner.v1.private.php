<?php

/**
 * @apiGroup           Partner
 * @apiName            createPartner
 *
 * @api                {POST} /v1/partner Endpoint title here..
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
$router->post('partner', [
    'as' => 'api_partner_create_partner',
    'uses'  => 'Controller@createPartner',
    'middleware' => [
      'auth:api',
    ],
]);
