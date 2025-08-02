<?php

namespace App\Containers\JobDescription\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateJobDescriptionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $jobdescription = Apiato::call('JobDescription@UpdateJobDescriptionTask', [$request->id, $data]);

        return $jobdescription;
    }
}
