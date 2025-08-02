<?php

namespace App\Containers\AccHistory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccHistoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acchistory = Apiato::call('AccHistory@CreateAccHistoryTask', [$data]);

        return $acchistory;
    }
}
