<?php

namespace App\Containers\AccCurrency\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccCurrencyAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccurrency = Apiato::call('AccCurrency@CreateAccCurrencyTask', [$data]);

        return $acccurrency;
    }
}
