<?php

namespace App\Containers\EmployeeCost\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindEmployeeCostByIdAction extends Action
{
    public function run(Request $request)
    {
        $employeecost = Apiato::call('EmployeeCost@FindEmployeeCostByIdTask', [$request->id]);

        return $employeecost;
    }
}
