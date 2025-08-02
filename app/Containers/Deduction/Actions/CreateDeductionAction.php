<?php

namespace App\Containers\Deduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateDeductionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $deduction = Apiato::call('Deduction@CreateDeductionTask', [$data]);

        return $deduction;
    }
}
