<?php

namespace App\Containers\EmployeeCost\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteEmployeeCostAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('EmployeeCost@DeleteEmployeeCostTask', [$request->id]);
    }
}
