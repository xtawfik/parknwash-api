<?php

namespace App\Containers\Bill\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateBillAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $bill = Apiato::call('Bill@CreateBillTask', [$data]);

        return $bill;
    }
}
