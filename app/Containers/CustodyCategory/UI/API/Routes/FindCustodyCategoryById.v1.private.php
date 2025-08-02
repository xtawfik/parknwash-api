<?php

/**
 * @apiGroup           CustodyCategory
 * @apiName            findCustodyCategoryById
 *
 * @api                {GET} /v1/custody_category/:id Endpoint title here..
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
$router->get('custody_category/{id}', [
    'as' => 'api_custodycategory_find_custody_category_by_id',
    'uses'  => 'Controller@findCustodyCategoryById',
    'middleware' => [
      'auth:api',
    ],
]);
