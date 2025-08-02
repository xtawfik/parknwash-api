<?php

namespace App\Containers\AccCashFlow\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccCashFlowAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccCashFlow@DeleteAccCashFlowTask', [$request->id]);
    }
}
