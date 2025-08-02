<?php

namespace App\Containers\AccProject\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccProjectByIdAction extends Action
{
    public function run(Request $request)
    {
        $accproject = Apiato::call('AccProject@FindAccProjectByIdTask', [$request->id]);

        return $accproject;
    }
}
