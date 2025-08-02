<?php

namespace App\Containers\AccReconciliation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccReconciliationsAction extends Action
{
    public function run(Request $request)
    {
        $accreconciliations = Apiato::call('AccReconciliation@GetAllAccReconciliationsTask', [], ['addRequestCriteria']);

        return $accreconciliations;
    }
}
