<?php

namespace App\Containers\AccCapitalAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccCapitalAccountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccapitalaccount = Apiato::call('AccCapitalAccount@CreateAccCapitalAccountTask', [$data]);

        return $acccapitalaccount;
    }
}
