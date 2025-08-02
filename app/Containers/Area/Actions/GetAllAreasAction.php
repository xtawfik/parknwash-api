<?php

namespace App\Containers\Area\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAreasAction extends Action
{
    public function run(Request $request)
    {
        $areas = Apiato::call('Area@GetAllAreasTask', [], ['addRequestCriteria']);

        return $areas;
    }
}
