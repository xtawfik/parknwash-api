<?php

namespace App\Containers\Area\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAreaByIdAction extends Action
{
    public function run(Request $request)
    {
        $area = Apiato::call('Area@FindAreaByIdTask', [$request->id]);

        return $area;
    }
}
