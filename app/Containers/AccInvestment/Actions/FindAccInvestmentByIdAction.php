<?php

namespace App\Containers\AccInvestment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccInvestmentByIdAction extends Action
{
    public function run(Request $request)
    {
        $accinvestment = Apiato::call('AccInvestment@FindAccInvestmentByIdTask', [$request->id]);

        return $accinvestment;
    }
}
