<?php

namespace App\Containers\Receipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateReceiptAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $receipt = Apiato::call('Receipt@CreateReceiptTask', [$data]);

        return $receipt;
    }
}
