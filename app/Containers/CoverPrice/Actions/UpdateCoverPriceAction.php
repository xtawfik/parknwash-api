<?php

namespace App\Containers\CoverPrice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCoverPriceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $coverprice = Apiato::call('CoverPrice@UpdateCoverPriceTask', [$request->id, $data]);

        return $coverprice;
    }
}
