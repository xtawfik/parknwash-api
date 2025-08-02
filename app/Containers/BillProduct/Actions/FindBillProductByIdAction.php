<?php

namespace App\Containers\BillProduct\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindBillProductByIdAction extends Action
{
    public function run(Request $request)
    {
        $billproduct = Apiato::call('BillProduct@FindBillProductByIdTask', [$request->id]);

        return $billproduct;
    }
}
