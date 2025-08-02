<?php

namespace App\Containers\AccInvestment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccInvestmentAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accinvestment = Apiato::call('AccInvestment@CreateAccInvestmentTask', [$data]);

        return $accinvestment;
    }
}
