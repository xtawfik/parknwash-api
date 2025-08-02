<?php

namespace App\Containers\AccReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccReceiptByIdAction extends Action
{
    public function run(Request $request)
    {
        $accreceipt = Apiato::call('AccReceipt@FindAccReceiptByIdTask', [$request->id]);

        return $accreceipt;
    }
}
