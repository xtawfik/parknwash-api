<?php

namespace App\Containers\AccCurrencyExchange\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccCurrencyExchangeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccCurrencyExchange@DeleteAccCurrencyExchangeTask', [$request->id]);
    }
}
