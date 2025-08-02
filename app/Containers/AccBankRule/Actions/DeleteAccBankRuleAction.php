<?php

namespace App\Containers\AccBankRule\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccBankRuleAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccBankRule@DeleteAccBankRuleTask', [$request->id]);
    }
}
