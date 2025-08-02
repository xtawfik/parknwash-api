<?php

namespace App\Containers\BillProduct\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateBillProductAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $billproduct = Apiato::call('BillProduct@UpdateBillProductTask', [$request->id, $data]);

        return $billproduct;
    }
}
