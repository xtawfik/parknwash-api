<?php

namespace App\Containers\AccControlAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccControlAccountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccontrolaccount = Apiato::call('AccControlAccount@CreateAccControlAccountTask', [$data]);

        return $acccontrolaccount;
    }
}
