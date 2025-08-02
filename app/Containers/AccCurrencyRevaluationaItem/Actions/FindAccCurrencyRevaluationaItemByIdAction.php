<?php

namespace App\Containers\AccCurrencyRevaluationaItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccCurrencyRevaluationaItemByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccurrencyrevaluationaitem = Apiato::call('AccCurrencyRevaluationaItem@FindAccCurrencyRevaluationaItemByIdTask', [$request->id]);

        return $acccurrencyrevaluationaitem;
    }
}
