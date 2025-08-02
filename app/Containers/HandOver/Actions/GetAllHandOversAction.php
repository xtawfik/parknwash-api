<?php

namespace App\Containers\HandOver\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllHandOversAction extends Action
{
    public function run(Request $request)
    {
        $handovers = Apiato::call('HandOver@GetAllHandOversTask', [], ['addRequestCriteria']);

        return $handovers;
    }
}
