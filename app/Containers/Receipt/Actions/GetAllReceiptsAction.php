<?php

namespace App\Containers\Receipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllReceiptsAction extends Action
{
    public function run(Request $request)
    {
        $receipts = Apiato::call('Receipt@GetAllReceiptsTask', [], ['addRequestCriteria']);

        return $receipts;
    }
}
