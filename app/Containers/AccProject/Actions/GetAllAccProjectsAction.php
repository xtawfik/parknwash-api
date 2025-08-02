<?php

namespace App\Containers\AccProject\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccProjectsAction extends Action
{
    public function run(Request $request)
    {
        $accprojects = Apiato::call('AccProject@GetAllAccProjectsTask', [], ['addRequestCriteria']);

        return $accprojects;
    }
}
