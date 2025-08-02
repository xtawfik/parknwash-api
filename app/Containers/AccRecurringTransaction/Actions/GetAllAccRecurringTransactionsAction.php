<?php

namespace App\Containers\AccRecurringTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccRecurringTransactionsAction extends Action
{
    public function run(Request $request)
    {
        $accrecurringtransactions = Apiato::call('AccRecurringTransaction@GetAllAccRecurringTransactionsTask', [], ['addRequestCriteria']);

        return $accrecurringtransactions;
    }
}
