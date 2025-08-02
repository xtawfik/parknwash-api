<?php

/**
 * @apiGroup           GeneralOption
 * @apiName            findGeneralOptionById
 *
 * @api                {GET} /v1/general_option/:id Endpoint title here..
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
$router->get('general_option/{id}', [
    'as' => 'api_generaloption_find_general_option_by_id',
    'uses'  => 'Controller@findGeneralOptionById',
    'middleware' => [
      'auth:api',
    ],
]);
