<?php

namespace App\Containers\AccCashFlow\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccCashFlowAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccashflow = Apiato::call('AccCashFlow@CreateAccCashFlowTask', [$data]);

        return $acccashflow;
    }
}
