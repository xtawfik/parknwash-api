<?php

namespace App\Containers\AllowanceType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAllowanceTypeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AllowanceType@DeleteAllowanceTypeTask', [$request->id]);
    }
}
