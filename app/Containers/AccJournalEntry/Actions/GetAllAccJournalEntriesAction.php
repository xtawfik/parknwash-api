<?php

namespace App\Containers\AccJournalEntry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccJournalEntriesAction extends Action
{
    public function run(Request $request)
    {
        $accjournalentries = Apiato::call('AccJournalEntry@GetAllAccJournalEntriesTask', [], ['addRequestCriteria']);

        return $accjournalentries;
    }
}
