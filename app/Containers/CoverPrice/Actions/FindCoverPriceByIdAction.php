<?php

namespace App\Containers\CoverPrice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCoverPriceByIdAction extends Action
{
    public function run(Request $request)
    {
        $coverprice = Apiato::call('CoverPrice@FindCoverPriceByIdTask', [$request->id]);

        return $coverprice;
    }
}
