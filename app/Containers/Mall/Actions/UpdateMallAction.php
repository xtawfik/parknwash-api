<?php

namespace App\Containers\Mall\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateMallAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $mall = Apiato::call('Mall@UpdateMallTask', [$request->id, $data]);

        return $mall;
    }
}
