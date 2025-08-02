<?php

namespace App\Containers\AccCurrency\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccCurrenciesAction extends Action
{
    public function run(Request $request)
    {
        $acccurrencies = Apiato::call('AccCurrency@GetAllAccCurrenciesTask', [], ['addRequestCriteria']);

        return $acccurrencies;
    }
}
