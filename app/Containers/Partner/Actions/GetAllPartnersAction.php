<?php

namespace App\Containers\Partner\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllPartnersAction extends Action
{
    public function run(Request $request)
    {
        $partners = Apiato::call('Partner@GetAllPartnersTask', [], ['addRequestCriteria']);

        return $partners;
    }
}
