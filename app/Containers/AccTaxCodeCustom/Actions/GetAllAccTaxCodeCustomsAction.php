<?php

namespace App\Containers\AccTaxCodeCustom\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccTaxCodeCustomsAction extends Action
{
    public function run(Request $request)
    {
        $acctaxcodecustoms = Apiato::call('AccTaxCodeCustom@GetAllAccTaxCodeCustomsTask', [], ['addRequestCriteria']);

        return $acctaxcodecustoms;
    }
}
