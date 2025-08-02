<?php

namespace App\Containers\AccCurrencyCurrency\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccCurrencyCurrencyAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccurrencycurrency = Apiato::call('AccCurrencyCurrency@CreateAccCurrencyCurrencyTask', [$data]);

        return $acccurrencycurrency;
    }
}
