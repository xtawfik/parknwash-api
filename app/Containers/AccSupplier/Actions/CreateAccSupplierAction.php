<?php

namespace App\Containers\AccSupplier\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccSupplierAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accsupplier = Apiato::call('AccSupplier@CreateAccSupplierTask', [$data]);

        return $accsupplier;
    }
}
