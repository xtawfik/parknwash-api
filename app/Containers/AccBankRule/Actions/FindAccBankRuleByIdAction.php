<?php

namespace App\Containers\AccBankRule\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccBankRuleByIdAction extends Action
{
    public function run(Request $request)
    {
        $accbankrule = Apiato::call('AccBankRule@FindAccBankRuleByIdTask', [$request->id]);

        return $accbankrule;
    }
}
