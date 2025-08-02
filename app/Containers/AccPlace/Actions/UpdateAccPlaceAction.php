<?php

namespace App\Containers\AccPlace\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccPlaceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accplace = Apiato::call('AccPlace@UpdateAccPlaceTask', [$request->id, $data]);

        return $accplace;
    }
}
