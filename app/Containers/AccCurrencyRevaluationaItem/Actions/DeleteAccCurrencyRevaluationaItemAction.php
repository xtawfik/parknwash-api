<?php

namespace App\Containers\AccCurrencyRevaluationaItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccCurrencyRevaluationaItemAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccCurrencyRevaluationaItem@DeleteAccCurrencyRevaluationaItemTask', [$request->id]);
    }
}
