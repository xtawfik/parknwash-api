<?php

namespace App\Containers\AccTaxCodeCustom\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccTaxCodeCustomByIdAction extends Action
{
    public function run(Request $request)
    {
        $acctaxcodecustom = Apiato::call('AccTaxCodeCustom@FindAccTaxCodeCustomByIdTask', [$request->id]);

        return $acctaxcodecustom;
    }
}
