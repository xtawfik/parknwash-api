<?php

/**
 * @apiGroup           AccCreditNote
 * @apiName            getAllAccCreditNotes
 *
 * @api                {GET} /v1/acc_credit_note Endpoint title here..
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
$router->get('acc_credit_note', [
    'as' => 'api_acccreditnote_get_all_acc_credit_notes',
    'uses'  => 'Controller@getAllAccCreditNotes',
    'middleware' => [
      'auth:api',
    ],
]);
