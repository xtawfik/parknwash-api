<?php

namespace App\Containers\Receipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindReceiptByIdAction extends Action
{
    public function run(Request $request)
    {
        $receipt = Apiato::call('Receipt@FindReceiptByIdTask', [$request->id]);

        return $receipt;
    }
}
