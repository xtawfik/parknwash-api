<?php

/**
 * @apiGroup           AccRecurringCategory
 * @apiName            updateAccRecurringCategory
 *
 * @api                {POST} /v1/acc_recurring_category/:id Endpoint title here..
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
$router->post('acc_recurring_category/{id}', [
    'as' => 'api_accrecurringcategory_update_acc_recurring_category',
    'uses'  => 'Controller@updateAccRecurringCategory',
    'middleware' => [
      'auth:api',
    ],
]);
