<?php

namespace App\Containers\Request\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllRequestsAction extends Action
{
    public function run(Request $request)
    {
        $requests = Apiato::call('Request@GetAllRequestsTask', [], ['addRequestCriteria']);

        return $requests;
    }
}
