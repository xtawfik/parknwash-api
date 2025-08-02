<?php

namespace App\Containers\AccInvestment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccInvestmentAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accinvestment = Apiato::call('AccInvestment@UpdateAccInvestmentTask', [$request->id, $data]);

        return $accinvestment;
    }
}
