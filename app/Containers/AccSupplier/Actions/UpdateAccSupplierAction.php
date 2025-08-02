<?php

namespace App\Containers\AccSupplier\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccSupplierAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accsupplier = Apiato::call('AccSupplier@UpdateAccSupplierTask', [$request->id, $data]);

        return $accsupplier;
    }
}
