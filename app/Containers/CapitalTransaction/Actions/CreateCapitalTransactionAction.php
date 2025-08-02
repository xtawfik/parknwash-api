<?php

namespace App\Containers\CapitalTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateCapitalTransactionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $capitaltransaction = Apiato::call('CapitalTransaction@CreateCapitalTransactionTask', [$data]);

        return $capitaltransaction;
    }
}
