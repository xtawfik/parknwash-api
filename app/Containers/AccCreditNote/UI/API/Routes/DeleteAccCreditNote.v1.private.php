<?php

/**
 * @apiGroup           AccCreditNote
 * @apiName            deleteAccCreditNote
 *
 * @api                {DELETE} /v1/acc_credit_note/:id Endpoint title here..
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
$router->delete('acc_credit_note/{id}', [
    'as' => 'api_acccreditnote_delete_acc_credit_note',
    'uses'  => 'Controller@deleteAccCreditNote',
    'middleware' => [
      'auth:api',
    ],
]);
