<?php

namespace App\Containers\AccEmployee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccEmployeeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accemployee = Apiato::call('AccEmployee@UpdateAccEmployeeTask', [$request->id, $data]);

        return $accemployee;
    }
}
