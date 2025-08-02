<?php

namespace App\Containers\AccReconciliation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccReconciliationByIdAction extends Action
{
    public function run(Request $request)
    {
        $accreconciliation = Apiato::call('AccReconciliation@FindAccReconciliationByIdTask', [$request->id]);

        return $accreconciliation;
    }
}
