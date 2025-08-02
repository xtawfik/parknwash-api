<?php

namespace App\Containers\BillProduct\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateBillProductAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $billproduct = Apiato::call('BillProduct@CreateBillProductTask', [$data]);

        return $billproduct;
    }
}
