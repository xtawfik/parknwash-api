<?php

namespace App\Containers\AccTaxCode\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccTaxCodeByIdAction extends Action
{
    public function run(Request $request)
    {
        $acctaxcode = Apiato::call('AccTaxCode@FindAccTaxCodeByIdTask', [$request->id]);

        return $acctaxcode;
    }
}
