<?php

namespace App\Containers\AccReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccReceiptAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccReceipt@DeleteAccReceiptTask', [$request->id]);
    }
}
