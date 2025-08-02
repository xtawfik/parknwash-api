<?php

namespace App\Containers\AccCurrencyCurrency\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccCurrencyCurrencyAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccurrencycurrency = Apiato::call('AccCurrencyCurrency@UpdateAccCurrencyCurrencyTask', [$request->id, $data]);

        return $acccurrencycurrency;
    }
}
