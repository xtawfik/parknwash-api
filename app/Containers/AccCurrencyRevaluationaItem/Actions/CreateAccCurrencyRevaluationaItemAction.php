<?php

namespace App\Containers\AccCurrencyRevaluationaItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccCurrencyRevaluationaItemAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccurrencyrevaluationaitem = Apiato::call('AccCurrencyRevaluationaItem@CreateAccCurrencyRevaluationaItemTask', [$data]);

        return $acccurrencyrevaluationaitem;
    }
}
