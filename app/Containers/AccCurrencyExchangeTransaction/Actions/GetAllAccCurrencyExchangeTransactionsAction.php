<?php

namespace App\Containers\AccCurrencyExchangeTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccCurrencyExchangeTransactionsAction extends Action
{
    public function run(Request $request)
    {
        $acccurrencyexchangetransactions = Apiato::call('AccCurrencyExchangeTransaction@GetAllAccCurrencyExchangeTransactionsTask', [], ['addRequestCriteria']);

        return $acccurrencyexchangetransactions;
    }
}
