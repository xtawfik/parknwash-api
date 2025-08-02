<?php

namespace App\Containers\Cover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateCoverAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $cover = Apiato::call('Cover@CreateCoverTask', [$data]);

        return $cover;
    }
}
