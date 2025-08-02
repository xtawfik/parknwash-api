<?php

namespace App\Containers\AccPlace\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccPlacesAction extends Action
{
    public function run(Request $request)
    {
        $accplaces = Apiato::call('AccPlace@GetAllAccPlacesTask', [], ['addRequestCriteria']);

        return $accplaces;
    }
}
