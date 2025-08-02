<?php

/**
 * @apiGroup           GeneralOption
 * @apiName            createGeneralOption
 *
 * @api                {POST} /v1/general_option Endpoint title here..
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
$router->post('general_option', [
    'as' => 'api_generaloption_create_general_option',
    'uses'  => 'Controller@createGeneralOption',
    'middleware' => [
      'auth:api',
    ],
]);
