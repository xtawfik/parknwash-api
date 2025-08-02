<?php

namespace App\Containers\AccInvestmentRevaluationItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccInvestmentRevaluationItemAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccInvestmentRevaluationItem@DeleteAccInvestmentRevaluationItemTask', [$request->id]);
    }
}
