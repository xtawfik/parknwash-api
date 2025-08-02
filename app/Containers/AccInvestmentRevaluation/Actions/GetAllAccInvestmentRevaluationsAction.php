<?php

namespace App\Containers\AccInvestmentRevaluation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccInvestmentRevaluationsAction extends Action
{
    public function run(Request $request)
    {
        $accinvestmentrevaluations = Apiato::call('AccInvestmentRevaluation@GetAllAccInvestmentRevaluationsTask', [], ['addRequestCriteria']);

        return $accinvestmentrevaluations;
    }
}
