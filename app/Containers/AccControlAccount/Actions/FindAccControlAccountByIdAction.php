<?php

namespace App\Containers\AccControlAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccControlAccountByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccontrolaccount = Apiato::call('AccControlAccount@FindAccControlAccountByIdTask', [$request->id]);

        return $acccontrolaccount;
    }
}
