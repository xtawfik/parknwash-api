<?php

namespace App\Containers\AccItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccItemAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accitem = Apiato::call('AccItem@CreateAccItemTask', [$data]);

        return $accitem;
    }
}
