<?php

namespace App\Containers\AccRecurringTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccRecurringTransactionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accrecurringtransaction = Apiato::call('AccRecurringTransaction@UpdateAccRecurringTransactionTask', [$request->id, $data]);

        return $accrecurringtransaction;
    }
}
