<?php

namespace App\Containers\Cover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCoversAction extends Action
{
    public function run(Request $request)
    {
        $covers = Apiato::call('Cover@GetAllCoversTask', [], ['addRequestCriteria']);

        return $covers;
    }
}
