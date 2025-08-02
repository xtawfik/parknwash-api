<?php

namespace App\Containers\EmployeeCost\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllEmployeeCostsAction extends Action
{
    public function run(Request $request)
    {
        $employeecosts = Apiato::call('EmployeeCost@GetAllEmployeeCostsTask', [], ['addRequestCriteria']);

        return $employeecosts;
    }
}
