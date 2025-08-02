<?php

namespace App\Containers\Account\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccountByIdAction extends Action
{
    public function run(Request $request)
    {
        $account = Apiato::call('Account@FindAccountByIdTask', [$request->id]);

        return $account;
    }
}
