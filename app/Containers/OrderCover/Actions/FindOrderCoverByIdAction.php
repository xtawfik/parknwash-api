<?php

namespace App\Containers\OrderCover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindOrderCoverByIdAction extends Action
{
    public function run(Request $request)
    {
        $ordercover = Apiato::call('OrderCover@FindOrderCoverByIdTask', [$request->id]);

        return $ordercover;
    }
}
