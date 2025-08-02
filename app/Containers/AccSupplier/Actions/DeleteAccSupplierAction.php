<?php

namespace App\Containers\AccSupplier\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccSupplierAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccSupplier@DeleteAccSupplierTask', [$request->id]);
    }
}
