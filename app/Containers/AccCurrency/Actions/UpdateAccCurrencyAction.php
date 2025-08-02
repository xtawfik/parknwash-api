<?php

namespace App\Containers\AccCurrency\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccCurrencyAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccurrency = Apiato::call('AccCurrency@UpdateAccCurrencyTask', [$request->id, $data]);

        return $acccurrency;
    }
}
