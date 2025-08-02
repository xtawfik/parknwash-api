<?php

namespace App\Containers\Mall\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllMallsAction extends Action
{
    public function run(Request $request)
    {
        $malls = Apiato::call('Mall@GetAllMallsTask', [], ['addRequestCriteria']);

        return $malls;
    }
}
