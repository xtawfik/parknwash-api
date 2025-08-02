<?php

namespace App\Containers\AccHistory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccHistoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acchistory = Apiato::call('AccHistory@UpdateAccHistoryTask', [$request->id, $data]);

        return $acchistory;
    }
}
