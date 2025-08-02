<?php

namespace App\Containers\JobCard\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateJobCardAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $jobcard = Apiato::call('JobCard@UpdateJobCardTask', [$request->id, $data]);

        return $jobcard;
    }
}
