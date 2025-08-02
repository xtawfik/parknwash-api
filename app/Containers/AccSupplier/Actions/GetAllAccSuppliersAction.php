<?php

namespace App\Containers\AccSupplier\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccSuppliersAction extends Action
{
    public function run(Request $request)
    {
        $accsuppliers = Apiato::call('AccSupplier@GetAllAccSuppliersTask', [], ['addRequestCriteria']);

        return $accsuppliers;
    }
}
