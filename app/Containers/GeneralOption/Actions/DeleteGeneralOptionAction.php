<?php

namespace App\Containers\GeneralOption\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteGeneralOptionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('GeneralOption@DeleteGeneralOptionTask', [$request->id]);
    }
}
