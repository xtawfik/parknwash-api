<?php

/**
 * @apiGroup           Bank
 * @apiName            updateBank
 *
 * @api                {POST} /v1/bank/:id Endpoint title here..
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
$router->post('bank/{id}', [
    'as' => 'api_bank_update_bank',
    'uses'  => 'Controller@updateBank',
    'middleware' => [
      'auth:api',
    ],
]);
