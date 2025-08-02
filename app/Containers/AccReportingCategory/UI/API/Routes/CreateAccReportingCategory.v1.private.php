<?php

/**
 * @apiGroup           AccReportingCategory
 * @apiName            createAccReportingCategory
 *
 * @api                {POST} /v1/acc_reporting_category Endpoint title here..
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
$router->post('acc_reporting_category', [
    'as' => 'api_accreportingcategory_create_acc_reporting_category',
    'uses'  => 'Controller@createAccReportingCategory',
    'middleware' => [
      'auth:api',
    ],
]);
