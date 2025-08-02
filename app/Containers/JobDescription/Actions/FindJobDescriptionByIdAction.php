<?php

namespace App\Containers\JobDescription\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindJobDescriptionByIdAction extends Action
{
    public function run(Request $request)
    {
        $jobdescription = Apiato::call('JobDescription@FindJobDescriptionByIdTask', [$request->id]);

        return $jobdescription;
    }
}
