<?php

namespace App\Containers\AccCurrencyExchange\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccCurrencyExchangeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccurrencyexchange = Apiato::call('AccCurrencyExchange@UpdateAccCurrencyExchangeTask', [$request->id, $data]);

        return $acccurrencyexchange;
    }
}
