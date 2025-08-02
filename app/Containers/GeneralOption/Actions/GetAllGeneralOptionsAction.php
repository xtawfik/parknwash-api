<?php

namespace App\Containers\GeneralOption\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllGeneralOptionsAction extends Action
{
    public function run(Request $request)
    {
        $generaloptions = Apiato::call('GeneralOption@GetAllGeneralOptionsTask', [], ['addRequestCriteria']);

        return $generaloptions;
    }
}
