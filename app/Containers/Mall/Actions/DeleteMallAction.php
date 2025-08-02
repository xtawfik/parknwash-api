<?php

namespace App\Containers\Mall\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteMallAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Mall@DeleteMallTask', [$request->id]);
    }
}
