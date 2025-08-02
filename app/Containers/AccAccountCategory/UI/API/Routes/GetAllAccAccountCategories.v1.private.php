<?php

/**
 * @apiGroup           AccAccountCategory
 * @apiName            getAllAccAccountCategories
 *
 * @api                {GET} /v1/acc_account_category Endpoint title here..
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
$router->get('acc_account_category', [
    'as' => 'api_accaccountcategory_get_all_acc_account_categories',
    'uses'  => 'Controller@getAllAccAccountCategories',
    'middleware' => [
      'auth:api',
    ],
]);
