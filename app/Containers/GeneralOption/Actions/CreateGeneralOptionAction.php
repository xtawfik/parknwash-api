<?php

namespace App\Containers\GeneralOption\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateGeneralOptionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $generaloption = Apiato::call('GeneralOption@CreateGeneralOptionTask', [$data]);

        return $generaloption;
    }
}
