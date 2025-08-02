<?php

namespace App\Containers\AccCurrency\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccCurrencyByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccurrency = Apiato::call('AccCurrency@FindAccCurrencyByIdTask', [$request->id]);

        return $acccurrency;
    }
}
