<?php

namespace App\Containers\AllowanceType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAllowanceTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $allowancetype = Apiato::call('AllowanceType@FindAllowanceTypeByIdTask', [$request->id]);

        return $allowancetype;
    }
}
