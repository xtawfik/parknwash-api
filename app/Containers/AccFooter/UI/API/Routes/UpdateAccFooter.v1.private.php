<?php

/**
 * @apiGroup           AccFooter
 * @apiName            updateAccFooter
 *
 * @api                {POST} /v1/acc_footer/:id Endpoint title here..
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
$router->post('acc_footer/{id}', [
    'as' => 'api_accfooter_update_acc_footer',
    'uses'  => 'Controller@updateAccFooter',
    'middleware' => [
      'auth:api',
    ],
]);
