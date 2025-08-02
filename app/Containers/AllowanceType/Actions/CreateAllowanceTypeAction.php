<?php

namespace App\Containers\AllowanceType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAllowanceTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $allowancetype = Apiato::call('AllowanceType@CreateAllowanceTypeTask', [$data]);

        return $allowancetype;
    }
}
