<?php

namespace App\Containers\AccInvestmentRevaluationItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccInvestmentRevaluationItemAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accinvestmentrevaluationitem = Apiato::call('AccInvestmentRevaluationItem@CreateAccInvestmentRevaluationItemTask', [$data]);

        return $accinvestmentrevaluationitem;
    }
}
