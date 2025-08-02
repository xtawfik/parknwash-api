<?php

/**
 * @apiGroup           AccRecurringCategory
 * @apiName            getAllAccRecurringCategories
 *
 * @api                {GET} /v1/acc_recurring_category Endpoint title here..
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
$router->get('acc_recurring_category', [
    'as' => 'api_accrecurringcategory_get_all_acc_recurring_categories',
    'uses'  => 'Controller@getAllAccRecurringCategories',
    'middleware' => [
      'auth:api',
    ],
]);
