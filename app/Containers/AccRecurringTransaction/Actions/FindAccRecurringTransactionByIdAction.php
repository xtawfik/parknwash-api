<?php

namespace App\Containers\AccRecurringTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccRecurringTransactionByIdAction extends Action
{
    public function run(Request $request)
    {
        $accrecurringtransaction = Apiato::call('AccRecurringTransaction@FindAccRecurringTransactionByIdTask', [$request->id]);

        return $accrecurringtransaction;
    }
}
