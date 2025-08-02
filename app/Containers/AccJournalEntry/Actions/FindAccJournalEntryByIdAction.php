<?php

namespace App\Containers\AccJournalEntry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccJournalEntryByIdAction extends Action
{
    public function run(Request $request)
    {
        $accjournalentry = Apiato::call('AccJournalEntry@FindAccJournalEntryByIdTask', [$request->id]);

        return $accjournalentry;
    }
}
