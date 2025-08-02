<?php

namespace App\Containers\AccCurrencyRevaluation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccCurrencyRevaluationByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccurrencyrevaluation = Apiato::call('AccCurrencyRevaluation@FindAccCurrencyRevaluationByIdTask', [$request->id]);

        return $acccurrencyrevaluation;
    }
}
