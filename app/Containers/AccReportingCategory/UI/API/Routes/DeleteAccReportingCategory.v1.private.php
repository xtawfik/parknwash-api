<?php

/**
 * @apiGroup           AccReportingCategory
 * @apiName            deleteAccReportingCategory
 *
 * @api                {DELETE} /v1/acc_reporting_category/:id Endpoint title here..
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
$router->delete('acc_reporting_category/{id}', [
    'as' => 'api_accreportingcategory_delete_acc_reporting_category',
    'uses'  => 'Controller@deleteAccReportingCategory',
    'middleware' => [
      'auth:api',
    ],
]);
