<?php

namespace App\Containers\AccInvestmentRevaluation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccInvestmentRevaluationAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accinvestmentrevaluation = Apiato::call('AccInvestmentRevaluation@CreateAccInvestmentRevaluationTask', [$data]);

        return $accinvestmentrevaluation;
    }
}
