<?php

namespace App\Containers\JobCard\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllJobCardsAction extends Action
{
    public function run(Request $request)
    {
        $jobcards = Apiato::call('JobCard@GetAllJobCardsTask', [], ['addRequestCriteria']);

        return $jobcards;
    }
}
