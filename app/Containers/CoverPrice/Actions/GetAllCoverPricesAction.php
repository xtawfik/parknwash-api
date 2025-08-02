<?php

namespace App\Containers\CoverPrice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCoverPricesAction extends Action
{
    public function run(Request $request)
    {
        $coverprices = Apiato::call('CoverPrice@GetAllCoverPricesTask', [], ['addRequestCriteria']);

        return $coverprices;
    }
}
