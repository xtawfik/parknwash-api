<?php

namespace App\Containers\AccCurrencyExchangeTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccCurrencyExchangeTransactionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccurrencyexchangetransaction = Apiato::call('AccCurrencyExchangeTransaction@UpdateAccCurrencyExchangeTransactionTask', [$request->id, $data]);

        return $acccurrencyexchangetransaction;
    }
}
