<?php

namespace App\Containers\AccReceipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccReceiptsAction extends Action
{
    public function run(Request $request)
    {
        $accreceipts = Apiato::call('AccReceipt@GetAllAccReceiptsTask', [], ['addRequestCriteria']);

        return $accreceipts;
    }
}
