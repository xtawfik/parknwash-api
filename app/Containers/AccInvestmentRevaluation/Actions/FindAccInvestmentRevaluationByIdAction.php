<?php

namespace App\Containers\AccInvestmentRevaluation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccInvestmentRevaluationByIdAction extends Action
{
    public function run(Request $request)
    {
        $accinvestmentrevaluation = Apiato::call('AccInvestmentRevaluation@FindAccInvestmentRevaluationByIdTask', [$request->id]);

        return $accinvestmentrevaluation;
    }
}
