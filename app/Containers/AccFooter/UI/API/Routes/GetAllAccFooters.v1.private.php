<?php

/**
 * @apiGroup           AccFooter
 * @apiName            getAllAccFooters
 *
 * @api                {GET} /v1/acc_footer Endpoint title here..
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
$router->get('acc_footer', [
    'as' => 'api_accfooter_get_all_acc_footers',
    'uses'  => 'Controller@getAllAccFooters',
    'middleware' => [
      'auth:api',
    ],
]);
