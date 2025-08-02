<?php

namespace App\Containers\Damaged\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteDamagedAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Damaged@DeleteDamagedTask', [$request->id]);
    }
}
