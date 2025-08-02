<?php

namespace App\Containers\AccProject\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccProjectAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accproject = Apiato::call('AccProject@UpdateAccProjectTask', [$request->id, $data]);

        return $accproject;
    }
}
