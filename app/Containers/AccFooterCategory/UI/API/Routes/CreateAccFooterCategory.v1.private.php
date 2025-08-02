<?php

/**
 * @apiGroup           AccFooterCategory
 * @apiName            createAccFooterCategory
 *
 * @api                {POST} /v1/acc_footer_category Endpoint title here..
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
$router->post('acc_footer_category', [
    'as' => 'api_accfootercategory_create_acc_footer_category',
    'uses'  => 'Controller@createAccFooterCategory',
    'middleware' => [
      'auth:api',
    ],
]);
