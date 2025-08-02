<?php

namespace App\Containers\GeneralOption\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindGeneralOptionByIdAction extends Action
{
    public function run(Request $request)
    {
        $generaloption = Apiato::call('GeneralOption@FindGeneralOptionByIdTask', [$request->id]);

        return $generaloption;
    }
}
