<?php

namespace App\Containers\AllowanceType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAllowanceTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $allowancetype = Apiato::call('AllowanceType@UpdateAllowanceTypeTask', [$request->id, $data]);

        return $allowancetype;
    }
}
