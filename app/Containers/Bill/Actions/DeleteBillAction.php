<?php

namespace App\Containers\Bill\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteBillAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Bill@DeleteBillTask', [$request->id]);
    }
}
