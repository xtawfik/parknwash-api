<?php

namespace App\Containers\AccBankRule\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccBankRuleAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accbankrule = Apiato::call('AccBankRule@CreateAccBankRuleTask', [$data]);

        return $accbankrule;
    }
}
