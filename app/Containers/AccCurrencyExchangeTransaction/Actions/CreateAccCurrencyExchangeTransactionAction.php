<?php

namespace App\Containers\AccCurrencyExchangeTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccCurrencyExchangeTransactionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccurrencyexchangetransaction = Apiato::call('AccCurrencyExchangeTransaction@CreateAccCurrencyExchangeTransactionTask', [$data]);

        return $acccurrencyexchangetransaction;
    }
}
