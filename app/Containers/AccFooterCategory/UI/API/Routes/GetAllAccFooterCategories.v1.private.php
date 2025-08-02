<?php

/**
 * @apiGroup           AccFooterCategory
 * @apiName            getAllAccFooterCategories
 *
 * @api                {GET} /v1/acc_footer_category Endpoint title here..
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
$router->get('acc_footer_category', [
    'as' => 'api_accfootercategory_get_all_acc_footer_categories',
    'uses'  => 'Controller@getAllAccFooterCategories',
    'middleware' => [
      'auth:api',
    ],
]);
