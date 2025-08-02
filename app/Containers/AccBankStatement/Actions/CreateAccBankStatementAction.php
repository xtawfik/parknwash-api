<?php

namespace App\Containers\AccBankStatement\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccBankStatementAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accbankstatement = Apiato::call('AccBankStatement@CreateAccBankStatementTask', [$data]);

        return $accbankstatement;
    }
}
