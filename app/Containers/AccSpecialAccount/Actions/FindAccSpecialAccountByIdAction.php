<?php

namespace App\Containers\AccSpecialAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccSpecialAccountByIdAction extends Action
{
    public function run(Request $request)
    {
        $accspecialaccount = Apiato::call('AccSpecialAccount@FindAccSpecialAccountByIdTask', [$request->id]);

        return $accspecialaccount;
    }
}
