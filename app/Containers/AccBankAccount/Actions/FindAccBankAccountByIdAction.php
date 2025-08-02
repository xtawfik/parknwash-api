<?php

namespace App\Containers\AccBankAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccBankAccountByIdAction extends Action
{
    public function run(Request $request)
    {
        $accbankaccount = Apiato::call('AccBankAccount@FindAccBankAccountByIdTask', [$request->id]);

        return $accbankaccount;
    }
}
