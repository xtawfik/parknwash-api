<?php

namespace App\Containers\AccJournalEntry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccJournalEntryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccJournalEntry@DeleteAccJournalEntryTask', [$request->id]);
    }
}
