<?php

namespace App\Containers\AccCurrencyCurrency\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccCurrencyCurrencyByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccurrencycurrency = Apiato::call('AccCurrencyCurrency@FindAccCurrencyCurrencyByIdTask', [$request->id]);

        return $acccurrencycurrency;
    }
}
