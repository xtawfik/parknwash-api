<?php

namespace App\Containers\AccInvestmentRevaluationItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccInvestmentRevaluationItemsAction extends Action
{
    public function run(Request $request)
    {
        $accinvestmentrevaluationitems = Apiato::call('AccInvestmentRevaluationItem@GetAllAccInvestmentRevaluationItemsTask', [], ['addRequestCriteria']);

        return $accinvestmentrevaluationitems;
    }
}
