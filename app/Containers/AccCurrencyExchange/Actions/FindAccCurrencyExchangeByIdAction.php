<?php

namespace App\Containers\AccCurrencyExchange\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccCurrencyExchangeByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccurrencyexchange = Apiato::call('AccCurrencyExchange@FindAccCurrencyExchangeByIdTask', [$request->id]);

        return $acccurrencyexchange;
    }
}
