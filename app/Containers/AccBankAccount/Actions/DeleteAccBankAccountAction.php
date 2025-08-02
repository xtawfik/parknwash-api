<?php

namespace App\Containers\AccBankAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccBankAccountAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccBankAccount@DeleteAccBankAccountTask', [$request->id]);
    }
}
