<?php

namespace App\Containers\AccEmployee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccEmployeeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accemployee = Apiato::call('AccEmployee@CreateAccEmployeeTask', [$data]);

        return $accemployee;
    }
}
