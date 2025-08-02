<?php

namespace App\Containers\AccAcountTransfer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccAcountTransfersAction extends Action
{
    public function run(Request $request)
    {
        $accacounttransfers = Apiato::call('AccAcountTransfer@GetAllAccAcountTransfersTask', [], ['addRequestCriteria']);

        return $accacounttransfers;
    }
}
