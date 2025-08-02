<?php

namespace App\Containers\Area\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAreaAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Area@DeleteAreaTask', [$request->id]);
    }
}
