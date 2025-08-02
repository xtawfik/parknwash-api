<?php

namespace App\Containers\CapitalTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCapitalTransactionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $capitaltransaction = Apiato::call('CapitalTransaction@UpdateCapitalTransactionTask', [$request->id, $data]);

        return $capitaltransaction;
    }
}
