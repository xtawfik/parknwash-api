<?php

namespace App\Containers\AccCapitalSubAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccCapitalSubAccountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccapitalsubaccount = Apiato::call('AccCapitalSubAccount@CreateAccCapitalSubAccountTask', [$data]);

        return $acccapitalsubaccount;
    }
}
