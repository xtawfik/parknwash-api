<?php

namespace App\Containers\Allowance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAllowanceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $allowance = Apiato::call('Allowance@CreateAllowanceTask', [$data]);

        return $allowance;
    }
}
