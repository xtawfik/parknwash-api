<?php

namespace App\Containers\AccProfitLossAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccProfitLossAccountAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccProfitLossAccount@DeleteAccProfitLossAccountTask', [$request->id]);
    }
}
