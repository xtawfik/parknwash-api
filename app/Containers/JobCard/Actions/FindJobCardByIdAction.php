<?php

namespace App\Containers\JobCard\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindJobCardByIdAction extends Action
{
    public function run(Request $request)
    {
        $jobcard = Apiato::call('JobCard@FindJobCardByIdTask', [$request->id]);

        return $jobcard;
    }
}
