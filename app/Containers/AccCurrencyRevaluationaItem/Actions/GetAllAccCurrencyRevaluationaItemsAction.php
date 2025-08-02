<?php

namespace App\Containers\AccCurrencyRevaluationaItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccCurrencyRevaluationaItemsAction extends Action
{
    public function run(Request $request)
    {
        $acccurrencyrevaluationaitems = Apiato::call('AccCurrencyRevaluationaItem@GetAllAccCurrencyRevaluationaItemsTask', [], ['addRequestCriteria']);

        return $acccurrencyrevaluationaitems;
    }
}
