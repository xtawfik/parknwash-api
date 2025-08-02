<?php

namespace App\Containers\AccTaxCode\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccTaxCodeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acctaxcode = Apiato::call('AccTaxCode@CreateAccTaxCodeTask', [$data]);

        return $acctaxcode;
    }
}
