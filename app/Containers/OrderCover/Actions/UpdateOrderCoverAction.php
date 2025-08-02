<?php

namespace App\Containers\OrderCover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateOrderCoverAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $ordercover = Apiato::call('OrderCover@UpdateOrderCoverTask', [$request->id, $data]);

        return $ordercover;
    }
}
