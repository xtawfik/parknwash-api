<?php

/**
 * @apiGroup           AccRecurringCategory
 * @apiName            deleteAccRecurringCategory
 *
 * @api                {DELETE} /v1/acc_recurring_category/:id Endpoint title here..
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
$router->delete('acc_recurring_category/{id}', [
    'as' => 'api_accrecurringcategory_delete_acc_recurring_category',
    'uses'  => 'Controller@deleteAccRecurringCategory',
    'middleware' => [
      'auth:api',
    ],
]);
