<?php

/**
 * @apiGroup           AccReportingCategoryType
 * @apiName            getAllAccReportingCategoryTypes
 *
 * @api                {GET} /v1/acc_reporting_category_type Endpoint title here..
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
$router->get('acc_reporting_category_type', [
    'as' => 'api_accreportingcategorytype_get_all_acc_reporting_category_types',
    'uses'  => 'Controller@getAllAccReportingCategoryTypes',
    'middleware' => [
      'auth:api',
    ],
]);
