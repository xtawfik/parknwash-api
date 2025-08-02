<?php

namespace App\Containers\Nationality\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllNationalitiesAction extends Action
{
    public function run(Request $request)
    {
        $nationalities = Apiato::call('Nationality@GetAllNationalitiesTask', [], ['addRequestCriteria']);

        return $nationalities;
    }
}
