<?php

namespace App\Containers\AccSupplier\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccSupplierByIdAction extends Action
{
    public function run(Request $request)
    {
        $accsupplier = Apiato::call('AccSupplier@FindAccSupplierByIdTask', [$request->id]);

        return $accsupplier;
    }
}
