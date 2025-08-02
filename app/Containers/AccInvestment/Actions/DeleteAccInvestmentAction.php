<?php

namespace App\Containers\AccInvestment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccInvestmentAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccInvestment@DeleteAccInvestmentTask', [$request->id]);
    }
}
