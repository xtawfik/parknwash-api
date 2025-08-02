<?php

namespace App\Containers\AccEmployee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccEmployeeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccEmployee@DeleteAccEmployeeTask', [$request->id]);
    }
}
