<?php

namespace App\Containers\AccCurrencyCurrency\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccCurrencyCurrenciesAction extends Action
{
    public function run(Request $request)
    {
        $acccurrencycurrencies = Apiato::call('AccCurrencyCurrency@GetAllAccCurrencyCurrenciesTask', [], ['addRequestCriteria']);

        return $acccurrencycurrencies;
    }
}
