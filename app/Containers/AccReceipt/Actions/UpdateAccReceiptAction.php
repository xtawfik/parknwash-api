<?php

namespace App\Containers\AccReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccReceiptAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accreceipt = Apiato::call('AccReceipt@UpdateAccReceiptTask', [$request->id, $data]);

        return $accreceipt;
    }
}
