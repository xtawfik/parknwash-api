<?php

namespace App\Containers\AccSpecialAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccSpecialAccountAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accspecialaccount = Apiato::call('AccSpecialAccount@UpdateAccSpecialAccountTask', [$request->id, $data]);

        return $accspecialaccount;
    }
}
