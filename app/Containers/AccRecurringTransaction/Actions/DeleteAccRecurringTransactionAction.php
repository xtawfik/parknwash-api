<?php

namespace App\Containers\AccRecurringTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccRecurringTransactionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccRecurringTransaction@DeleteAccRecurringTransactionTask', [$request->id]);
    }
}
