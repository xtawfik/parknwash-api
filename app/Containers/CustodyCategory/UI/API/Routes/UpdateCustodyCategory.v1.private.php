<?php

/**
 * @apiGroup           CustodyCategory
 * @apiName            updateCustodyCategory
 *
 * @api                {POST} /v1/custody_category/:id Endpoint title here..
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
$router->post('custody_category/{id}', [
    'as' => 'api_custodycategory_update_custody_category',
    'uses'  => 'Controller@updateCustodyCategory',
    'middleware' => [
      'auth:api',
    ],
]);
