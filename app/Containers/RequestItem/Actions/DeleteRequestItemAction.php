<?php

namespace App\Containers\RequestItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteRequestItemAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('RequestItem@DeleteRequestItemTask', [$request->id]);
    }
}
