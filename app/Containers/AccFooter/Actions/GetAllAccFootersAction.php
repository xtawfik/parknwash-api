<?php

namespace App\Containers\AccFooter\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccFootersAction extends Action
{
    public function run(Request $request)
    {
        $accfooters = Apiato::call('AccFooter@GetAllAccFootersTask', [], ['addRequestCriteria']);

        return $accfooters;
    }
}
