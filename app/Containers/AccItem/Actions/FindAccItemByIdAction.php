<?php

namespace App\Containers\AccItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccItemByIdAction extends Action
{
    public function run(Request $request)
    {
        $accitem = Apiato::call('AccItem@FindAccItemByIdTask', [$request->id]);

        return $accitem;
    }
}
