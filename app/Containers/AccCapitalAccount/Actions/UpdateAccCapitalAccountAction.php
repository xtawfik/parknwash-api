<?php

namespace App\Containers\AccCapitalAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccCapitalAccountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccapitalaccount = Apiato::call('AccCapitalAccount@UpdateAccCapitalAccountTask', [$request->id, $data]);

        return $acccapitalaccount;
    }
}
