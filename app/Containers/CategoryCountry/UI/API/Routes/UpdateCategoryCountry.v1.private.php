<?php

/**
 * @apiGroup           CategoryCountry
 * @apiName            updateCategoryCountry
 *
 * @api                {POST} /v1/category_country/:id Endpoint title here..
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
$router->post('category_country/{id}', [
    'as' => 'api_categorycountry_update_category_country',
    'uses'  => 'Controller@updateCategoryCountry',
    'middleware' => [
      'auth:api',
    ],
]);
