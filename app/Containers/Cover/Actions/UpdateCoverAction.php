<?php

namespace App\Containers\Cover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCoverAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $cover = Apiato::call('Cover@UpdateCoverTask', [$request->id, $data]);

        return $cover;
    }
}
