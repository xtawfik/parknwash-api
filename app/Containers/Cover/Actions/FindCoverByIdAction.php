<?php

namespace App\Containers\Cover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCoverByIdAction extends Action
{
    public function run(Request $request)
    {
        $cover = Apiato::call('Cover@FindCoverByIdTask', [$request->id]);

        return $cover;
    }
}
