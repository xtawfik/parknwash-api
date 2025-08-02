<?php

namespace App\Containers\AccCurrencyExchangeTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccCurrencyExchangeTransactionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccCurrencyExchangeTransaction@DeleteAccCurrencyExchangeTransactionTask', [$request->id]);
    }
}
