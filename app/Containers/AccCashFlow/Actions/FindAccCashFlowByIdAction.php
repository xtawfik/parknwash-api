<?php

namespace App\Containers\AccCashFlow\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccCashFlowByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccashflow = Apiato::call('AccCashFlow@FindAccCashFlowByIdTask', [$request->id]);

        return $acccashflow;
    }
}
