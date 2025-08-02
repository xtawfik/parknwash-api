<?php

namespace App\Containers\AccJournalEntry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccJournalEntryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accjournalentry = Apiato::call('AccJournalEntry@CreateAccJournalEntryTask', [$data]);

        return $accjournalentry;
    }
}
