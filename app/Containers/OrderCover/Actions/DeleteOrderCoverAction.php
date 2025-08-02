<?php

namespace App\Containers\OrderCover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteOrderCoverAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('OrderCover@DeleteOrderCoverTask', [$request->id]);
    }
}
