<?php

/**
 * @apiGroup           AccReportingCategory
 * @apiName            getAllAccReportingCategories
 *
 * @api                {GET} /v1/acc_reporting_category Endpoint title here..
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
$router->get('acc_reporting_category', [
    'as' => 'api_accreportingcategory_get_all_acc_reporting_categories',
    'uses'  => 'Controller@getAllAccReportingCategories',
    'middleware' => [
      'auth:api',
    ],
]);
