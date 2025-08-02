<?php

namespace App\Containers\JobCard\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateJobCardAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $jobcard = Apiato::call('JobCard@CreateJobCardTask', [$data]);

        return $jobcard;
    }
}
