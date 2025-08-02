<?php

namespace App\Containers\EmployeeCost\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateEmployeeCostAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $employeecost = Apiato::call('EmployeeCost@UpdateEmployeeCostTask', [$request->id, $data]);

        return $employeecost;
    }
}
