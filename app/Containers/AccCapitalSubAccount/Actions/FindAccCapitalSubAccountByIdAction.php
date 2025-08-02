<?php

namespace App\Containers\AccCapitalSubAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccCapitalSubAccountByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccapitalsubaccount = Apiato::call('AccCapitalSubAccount@FindAccCapitalSubAccountByIdTask', [$request->id]);

        return $acccapitalsubaccount;
    }
}
