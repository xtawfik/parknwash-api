<?php

namespace App\Containers\Deduction\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteDeductionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Deduction@DeleteDeductionTask', [$request->id]);
    }
}
