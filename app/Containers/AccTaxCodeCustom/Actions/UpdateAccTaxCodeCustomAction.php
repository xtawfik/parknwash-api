<?php

namespace App\Containers\AccTaxCodeCustom\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccTaxCodeCustomAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acctaxcodecustom = Apiato::call('AccTaxCodeCustom@UpdateAccTaxCodeCustomTask', [$request->id, $data]);

        return $acctaxcodecustom;
    }
}
