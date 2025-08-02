<?php

namespace App\Containers\AccPlace\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccPlaceByIdAction extends Action
{
    public function run(Request $request)
    {
        $accplace = Apiato::call('AccPlace@FindAccPlaceByIdTask', [$request->id]);

        return $accplace;
    }
}
