<?php

namespace App\Containers\Bill\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateBillAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $bill = Apiato::call('Bill@UpdateBillTask', [$request->id, $data]);

        return $bill;
    }
}
