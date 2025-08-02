<?php

namespace App\Containers\Deduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindDeductionByIdAction extends Action
{
    public function run(Request $request)
    {
        $deduction = Apiato::call('Deduction@FindDeductionByIdTask', [$request->id]);

        return $deduction;
    }
}
