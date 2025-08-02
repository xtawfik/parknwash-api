<?php

namespace App\Containers\AccCurrencyRevaluation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccCurrencyRevaluationAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccurrencyrevaluation = Apiato::call('AccCurrencyRevaluation@UpdateAccCurrencyRevaluationTask', [$request->id, $data]);

        return $acccurrencyrevaluation;
    }
}
