<?php

namespace App\Containers\AccCurrency\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccCurrencyAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccCurrency@DeleteAccCurrencyTask', [$request->id]);
    }
}
