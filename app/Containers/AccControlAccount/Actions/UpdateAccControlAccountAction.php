<?php

namespace App\Containers\AccControlAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccControlAccountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccontrolaccount = Apiato::call('AccControlAccount@UpdateAccControlAccountTask', [$request->id, $data]);

        return $acccontrolaccount;
    }
}
