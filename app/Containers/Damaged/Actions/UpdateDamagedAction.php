<?php

namespace App\Containers\Damaged\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateDamagedAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $damaged = Apiato::call('Damaged@UpdateDamagedTask', [$request->id, $data]);

        return $damaged;
    }
}
