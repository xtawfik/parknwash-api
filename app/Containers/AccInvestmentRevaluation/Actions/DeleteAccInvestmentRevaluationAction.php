<?php

namespace App\Containers\AccInvestmentRevaluation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccInvestmentRevaluationAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccInvestmentRevaluation@DeleteAccInvestmentRevaluationTask', [$request->id]);
    }
}
