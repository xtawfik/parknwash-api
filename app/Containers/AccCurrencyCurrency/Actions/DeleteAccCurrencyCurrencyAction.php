<?php

namespace App\Containers\AccCurrencyCurrency\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccCurrencyCurrencyAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccCurrencyCurrency@DeleteAccCurrencyCurrencyTask', [$request->id]);
    }
}
