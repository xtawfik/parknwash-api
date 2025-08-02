<?php

namespace App\Containers\JobDescription\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateJobDescriptionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $jobdescription = Apiato::call('JobDescription@CreateJobDescriptionTask', [$data]);

        return $jobdescription;
    }
}
