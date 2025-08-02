<?php

/**
 * @apiGroup           AccRecurringCategory
 * @apiName            createAccRecurringCategory
 *
 * @api                {POST} /v1/acc_recurring_category Endpoint title here..
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
$router->post('acc_recurring_category', [
    'as' => 'api_accrecurringcategory_create_acc_recurring_category',
    'uses'  => 'Controller@createAccRecurringCategory',
    'middleware' => [
      'auth:api',
    ],
]);
