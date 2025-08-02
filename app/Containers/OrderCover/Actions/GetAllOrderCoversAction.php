<?php

namespace App\Containers\OrderCover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllOrderCoversAction extends Action
{
    public function run(Request $request)
    {
        $ordercovers = Apiato::call('OrderCover@GetAllOrderCoversTask', [], ['addRequestCriteria']);

        return $ordercovers;
    }
}
