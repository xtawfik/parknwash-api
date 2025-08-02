<?php

namespace App\Containers\AccItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccItemAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accitem = Apiato::call('AccItem@UpdateAccItemTask', [$request->id, $data]);

        return $accitem;
    }
}
