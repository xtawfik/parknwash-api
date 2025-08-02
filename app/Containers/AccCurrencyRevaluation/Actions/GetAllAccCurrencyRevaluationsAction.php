<?php

namespace App\Containers\AccCurrencyRevaluation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccCurrencyRevaluationsAction extends Action
{
    public function run(Request $request)
    {
        $acccurrencyrevaluations = Apiato::call('AccCurrencyRevaluation@GetAllAccCurrencyRevaluationsTask', [], ['addRequestCriteria']);

        return $acccurrencyrevaluations;
    }
}
