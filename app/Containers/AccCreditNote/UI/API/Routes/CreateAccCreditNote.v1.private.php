<?php

/**
 * @apiGroup           AccCreditNote
 * @apiName            createAccCreditNote
 *
 * @api                {POST} /v1/acc_credit_note Endpoint title here..
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
$router->post('acc_credit_note', [
    'as' => 'api_acccreditnote_create_acc_credit_note',
    'uses'  => 'Controller@createAccCreditNote',
    'middleware' => [
      'auth:api',
    ],
]);
