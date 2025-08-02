<?php

namespace App\Containers\Receipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateReceiptAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $receipt = Apiato::call('Receipt@UpdateReceiptTask', [$request->id, $data]);

        return $receipt;
    }
}
