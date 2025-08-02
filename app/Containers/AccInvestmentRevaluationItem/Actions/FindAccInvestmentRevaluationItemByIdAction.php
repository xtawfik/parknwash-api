<?php

namespace App\Containers\AccInvestmentRevaluationItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccInvestmentRevaluationItemByIdAction extends Action
{
    public function run(Request $request)
    {
        $accinvestmentrevaluationitem = Apiato::call('AccInvestmentRevaluationItem@FindAccInvestmentRevaluationItemByIdTask', [$request->id]);

        return $accinvestmentrevaluationitem;
    }
}
