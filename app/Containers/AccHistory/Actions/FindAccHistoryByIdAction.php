<?php

namespace App\Containers\AccHistory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccHistoryByIdAction extends Action
{
    public function run(Request $request)
    {
        $acchistory = Apiato::call('AccHistory@FindAccHistoryByIdTask', [$request->id]);

        return $acchistory;
    }
}
