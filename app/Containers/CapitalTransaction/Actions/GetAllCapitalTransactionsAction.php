<?php

namespace App\Containers\CapitalTransaction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCapitalTransactionsAction extends Action
{
    public function run(Request $request)
    {
        $capitaltransactions = Apiato::call('CapitalTransaction@GetAllCapitalTransactionsTask', [], ['addRequestCriteria']);

        return $capitaltransactions;
    }
}
