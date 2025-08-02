<?php

namespace App\Containers\Bank\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateBankAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $bank = Apiato::call('Bank@CreateBankTask', [$data]);

        return $bank;
    }
}
