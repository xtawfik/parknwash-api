<?php

namespace App\Containers\Allowance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAllowanceByIdAction extends Action
{
    public function run(Request $request)
    {
        $allowance = Apiato::call('Allowance@FindAllowanceByIdTask', [$request->id]);

        return $allowance;
    }
}
