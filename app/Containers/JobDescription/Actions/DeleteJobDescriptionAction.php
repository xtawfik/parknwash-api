<?php

namespace App\Containers\JobDescription\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteJobDescriptionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('JobDescription@DeleteJobDescriptionTask', [$request->id]);
    }
}
