<?php

namespace App\Containers\AccAcountTransfer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccAcountTransferAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accacounttransfer = Apiato::call('AccAcountTransfer@CreateAccAcountTransferTask', [$data]);

        return $accacounttransfer;
    }
}
