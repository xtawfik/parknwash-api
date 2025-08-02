<?php

namespace App\Containers\Account\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccountAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Account@DeleteAccountTask', [$request->id]);
    }
}
