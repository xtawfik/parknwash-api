<?php

namespace App\Containers\AccAcountTransfer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccAcountTransferByIdAction extends Action
{
    public function run(Request $request)
    {
        $accacounttransfer = Apiato::call('AccAcountTransfer@FindAccAcountTransferByIdTask', [$request->id]);

        return $accacounttransfer;
    }
}
