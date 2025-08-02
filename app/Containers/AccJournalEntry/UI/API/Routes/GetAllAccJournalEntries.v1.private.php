<?php

/**
 * @apiGroup           AccJournalEntry
 * @apiName            getAllAccJournalEntries
 *
 * @api                {GET} /v1/acc_journal_entry Endpoint title here..
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
$router->get('acc_journal_entry', [
    'as' => 'api_accjournalentry_get_all_acc_journal_entries',
    'uses'  => 'Controller@getAllAccJournalEntries',
    'middleware' => [
      'auth:api',
    ],
]);
