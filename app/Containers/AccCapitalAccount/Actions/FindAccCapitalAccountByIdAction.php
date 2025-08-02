<?php

namespace App\Containers\AccCapitalAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccCapitalAccountByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccapitalaccount = Apiato::call('AccCapitalAccount@FindAccCapitalAccountByIdTask', [$request->id]);

        return $acccapitalaccount;
    }
}
