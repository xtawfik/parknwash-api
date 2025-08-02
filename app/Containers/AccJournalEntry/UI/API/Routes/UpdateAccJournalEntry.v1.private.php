<?php

/**
 * @apiGroup           AccJournalEntry
 * @apiName            updateAccJournalEntry
 *
 * @api                {POST} /v1/acc_journal_entry/:id Endpoint title here..
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
$router->post('acc_journal_entry/{id}', [
    'as' => 'api_accjournalentry_update_acc_journal_entry',
    'uses'  => 'Controller@updateAccJournalEntry',
    'middleware' => [
      'auth:api',
    ],
]);
