<?php

namespace App\Containers\AccBankStatement\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccBankStatementAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccBankStatement@DeleteAccBankStatementTask', [$request->id]);
    }
}
