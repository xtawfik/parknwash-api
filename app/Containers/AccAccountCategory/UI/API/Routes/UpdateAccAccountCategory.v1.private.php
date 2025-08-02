<?php

/**
 * @apiGroup           AccAccountCategory
 * @apiName            updateAccAccountCategory
 *
 * @api                {POST} /v1/acc_account_category/:id Endpoint title here..
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
$router->post('acc_account_category/{id}', [
    'as' => 'api_accaccountcategory_update_acc_account_category',
    'uses'  => 'Controller@updateAccAccountCategory',
    'middleware' => [
      'auth:api',
    ],
]);
