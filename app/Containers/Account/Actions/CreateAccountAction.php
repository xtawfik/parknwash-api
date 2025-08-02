<?php

namespace App\Containers\Account\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $account = Apiato::call('Account@CreateAccountTask', [$data]);

        return $account;
    }
}
