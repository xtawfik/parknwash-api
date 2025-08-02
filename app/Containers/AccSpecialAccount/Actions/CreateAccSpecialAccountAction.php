<?php

namespace App\Containers\AccSpecialAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccSpecialAccountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accspecialaccount = Apiato::call('AccSpecialAccount@CreateAccSpecialAccountTask', [$data]);

        return $accspecialaccount;
    }
}
