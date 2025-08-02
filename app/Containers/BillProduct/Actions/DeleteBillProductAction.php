<?php

namespace App\Containers\BillProduct\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteBillProductAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('BillProduct@DeleteBillProductTask', [$request->id]);
    }
}
