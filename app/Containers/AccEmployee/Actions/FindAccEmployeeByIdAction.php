<?php

namespace App\Containers\AccEmployee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccEmployeeByIdAction extends Action
{
    public function run(Request $request)
    {
        $accemployee = Apiato::call('AccEmployee@FindAccEmployeeByIdTask', [$request->id]);

        return $accemployee;
    }
}
