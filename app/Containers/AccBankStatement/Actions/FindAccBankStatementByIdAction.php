<?php

namespace App\Containers\AccBankStatement\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccBankStatementByIdAction extends Action
{
    public function run(Request $request)
    {
        $accbankstatement = Apiato::call('AccBankStatement@FindAccBankStatementByIdTask', [$request->id]);

        return $accbankstatement;
    }
}
