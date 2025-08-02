<?php

/**
 * @apiGroup           GeneralOption
 * @apiName            updateGeneralOption
 *
 * @api                {POST} /v1/general_option/:id Endpoint title here..
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
$router->post('general_option/{id}', [
    'as' => 'api_generaloption_update_general_option',
    'uses'  => 'Controller@updateGeneralOption',
    'middleware' => [
      'auth:api',
    ],
]);
