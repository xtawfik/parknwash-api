<?php

/**
 * @apiGroup           AccFooter
 * @apiName            findAccFooterById
 *
 * @api                {GET} /v1/acc_footer/:id Endpoint title here..
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
$router->get('acc_footer/{id}', [
    'as' => 'api_accfooter_find_acc_footer_by_id',
    'uses'  => 'Controller@findAccFooterById',
    'middleware' => [
      'auth:api',
    ],
]);
