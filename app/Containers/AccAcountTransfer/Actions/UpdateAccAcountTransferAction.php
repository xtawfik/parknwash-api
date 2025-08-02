<?php

namespace App\Containers\AccAcountTransfer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccAcountTransferAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accacounttransfer = Apiato::call('AccAcountTransfer@UpdateAccAcountTransferTask', [$request->id, $data]);

        return $accacounttransfer;
    }
}
