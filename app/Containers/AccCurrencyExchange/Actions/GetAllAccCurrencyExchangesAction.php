<?php

namespace App\Containers\AccCurrencyExchange\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccCurrencyExchangesAction extends Action
{
    public function run(Request $request)
    {
        $acccurrencyexchanges = Apiato::call('AccCurrencyExchange@GetAllAccCurrencyExchangesTask', [], ['addRequestCriteria']);

        return $acccurrencyexchanges;
    }
}
