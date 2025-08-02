<?php

namespace App\Containers\AccBankAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccBankAccountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accbankaccount = Apiato::call('AccBankAccount@UpdateAccBankAccountTask', [$request->id, $data]);

        return $accbankaccount;
    }
}
