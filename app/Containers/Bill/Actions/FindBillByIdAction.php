<?php

namespace App\Containers\Bill\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindBillByIdAction extends Action
{
    public function run(Request $request)
    {
        $bill = Apiato::call('Bill@FindBillByIdTask', [$request->id]);

        return $bill;
    }
}
