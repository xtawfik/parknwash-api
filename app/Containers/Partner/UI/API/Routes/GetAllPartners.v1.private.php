<?php

/**
 * @apiGroup           Partner
 * @apiName            getAllPartners
 *
 * @api                {GET} /v1/partner Endpoint title here..
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
$router->get('partner', [
    'as' => 'api_partner_get_all_partners',
    'uses'  => 'Controller@getAllPartners',
    'middleware' => [
      'auth:api',
    ],
]);
