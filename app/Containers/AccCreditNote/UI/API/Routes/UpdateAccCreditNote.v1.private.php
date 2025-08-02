<?php

/**
 * @apiGroup           AccCreditNote
 * @apiName            updateAccCreditNote
 *
 * @api                {POST} /v1/acc_credit_note/:id Endpoint title here..
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
$router->post('acc_credit_note/{id}', [
    'as' => 'api_acccreditnote_update_acc_credit_note',
    'uses'  => 'Controller@updateAccCreditNote',
    'middleware' => [
      'auth:api',
    ],
]);
