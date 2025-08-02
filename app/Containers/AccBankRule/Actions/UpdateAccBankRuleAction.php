<?php

namespace App\Containers\AccBankRule\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccBankRuleAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accbankrule = Apiato::call('AccBankRule@UpdateAccBankRuleTask', [$request->id, $data]);

        return $accbankrule;
    }
}
