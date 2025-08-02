<?php

namespace App\Containers\AccCurrencyRevaluation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccCurrencyRevaluationAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccurrencyrevaluation = Apiato::call('AccCurrencyRevaluation@CreateAccCurrencyRevaluationTask', [$data]);

        return $acccurrencyrevaluation;
    }
}
