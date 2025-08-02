<?php

namespace App\Containers\AccCurrencyExchangeTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccCurrencyExchangeTransactionByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccurrencyexchangetransaction = Apiato::call('AccCurrencyExchangeTransaction@FindAccCurrencyExchangeTransactionByIdTask', [$request->id]);

        return $acccurrencyexchangetransaction;
    }
}
