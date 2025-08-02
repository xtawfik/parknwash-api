<?php

namespace App\Containers\AccProject\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccProjectAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccProject@DeleteAccProjectTask', [$request->id]);
    }
}
