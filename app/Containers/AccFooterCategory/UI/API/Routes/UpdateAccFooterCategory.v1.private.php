<?php

/**
 * @apiGroup           AccFooterCategory
 * @apiName            updateAccFooterCategory
 *
 * @api                {POST} /v1/acc_footer_category/:id Endpoint title here..
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
$router->post('acc_footer_category/{id}', [
    'as' => 'api_accfootercategory_update_acc_footer_category',
    'uses'  => 'Controller@updateAccFooterCategory',
    'middleware' => [
      'auth:api',
    ],
]);
