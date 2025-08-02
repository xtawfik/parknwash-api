<?php

namespace App\Containers\CoverPrice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCoverPriceAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('CoverPrice@DeleteCoverPriceTask', [$request->id]);
    }
}
