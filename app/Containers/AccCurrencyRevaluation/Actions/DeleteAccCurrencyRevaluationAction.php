<?php

namespace App\Containers\AccCurrencyRevaluation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccCurrencyRevaluationAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccCurrencyRevaluation@DeleteAccCurrencyRevaluationTask', [$request->id]);
    }
}
