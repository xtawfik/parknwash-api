<?php

namespace App\Containers\BillProduct\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllBillProductsAction extends Action
{
    public function run(Request $request)
    {
        $billproducts = Apiato::call('BillProduct@GetAllBillProductsTask', [], ['addRequestCriteria']);

        return $billproducts;
    }
}
