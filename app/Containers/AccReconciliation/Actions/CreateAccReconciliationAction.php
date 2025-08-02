<?php

namespace App\Containers\AccReconciliation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccReconciliationAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accreconciliation = Apiato::call('AccReconciliation@CreateAccReconciliationTask', [$data]);

        return $accreconciliation;
    }
}
