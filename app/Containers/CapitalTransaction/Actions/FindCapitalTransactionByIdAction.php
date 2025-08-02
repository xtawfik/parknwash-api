<?php

namespace App\Containers\CapitalTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCapitalTransactionByIdAction extends Action
{
    public function run(Request $request)
    {
        $capitaltransaction = Apiato::call('CapitalTransaction@FindCapitalTransactionByIdTask', [$request->id]);

        return $capitaltransaction;
    }
}
