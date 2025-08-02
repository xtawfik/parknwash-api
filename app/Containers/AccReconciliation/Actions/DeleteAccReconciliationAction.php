<?php

namespace App\Containers\AccReconciliation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccReconciliationAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccReconciliation@DeleteAccReconciliationTask', [$request->id]);
    }
}
