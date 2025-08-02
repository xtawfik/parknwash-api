<?php

namespace App\Containers\JobDescription\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllJobDescriptionsAction extends Action
{
    public function run(Request $request)
    {
        $jobdescriptions = Apiato::call('JobDescription@GetAllJobDescriptionsTask', [], ['addRequestCriteria']);

        return $jobdescriptions;
    }
}
