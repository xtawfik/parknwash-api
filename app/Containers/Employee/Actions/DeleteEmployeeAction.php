<?php

namespace App\Containers\Employee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteEmployeeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Employee@DeleteEmployeeTask', [$request->id]);
    }
}
